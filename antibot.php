<?php
function is_bot() {
    $bots = array(
        'googlebot', 'bingbot', 'slurp', 'duckduckbot', 'baiduspider', 'yandexbot', 
        'facebookexternalhit', 'twitterbot', 'rogerbot', 'linkedinbot', 'embedly', 
        'quora link preview', 'showyoubot', 'outbrain', 'pinterest/0.', 'developers.google.com/+/web/snippet', 
        'slackbot', 'vkshare', 'w3c_validator', 'redditbot', 'applebot', 'whatsapp', 'flipboard', 
        'tumblr', 'bitlybot', 'skypeuripreview', 'nuzzel', 'discordbot', 'google pageant', 
        'qwantify', 'pinterestbot', 'bitlybot', 'telegrambot', 'curl', 'wget', 'python', 'php', 'java'
    );
    
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
    
    foreach ($bots as $bot) {
        if (strpos($userAgent, $bot) !== false) {
            return true;
        }
    }
    
    // Check for empty user agent
    if (empty($userAgent)) {
        return true;
    }
    
    return false;
}

if (is_bot()) {
    header('HTTP/1.1 403 Forbidden');
    echo '<!doctype html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Access Restricted</title>
      <style>
        body { font-family: sans-serif; background:#fafafa; display:flex; justify-content:center; align-items:center; height:100vh; margin:0; }
        .card { background:#fff; padding:2.5rem; border:1px solid #ddd; border-radius:12px; text-align:center; box-shadow: 0 4px 12px rgba(0,0,0,0.05); max-width: 400px; }
        h1 { margin:0 0 1rem; color: #333; font-size: 24px; }
        p { color:#666; line-height: 1.5; font-size: 15px; }
      </style>
    </head>
    <body>
      <div class="card">
        <h1>Access Restricted</h1>
        <p>Your request could not be verified. If you are a real user, please try again later or contact support if the problem persists.</p>
      </div>
      <script>
        setTimeout(() => {
            window.location.href = "https://www.google.com";
        }, 2000)
      </script>
    </body>
    </html>';
    exit;
}
?>
