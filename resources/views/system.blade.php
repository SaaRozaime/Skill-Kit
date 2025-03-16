<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin System Maintenance</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Lexend, sans-serif;
      overflow: hidden;
      position: relative;
      opacity: 0;
      animation: fadeIn 1.5s ease-in-out forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    /* Top Bar */
    .top-bar {
      width: 100%;
      height: 140px;
      background-color: #F0F0F0;
      color: black;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 24px;
      position: relative;
      border-bottom: 3px solid black;
    }

    .top-bar-left {
      display: flex;
      align-items: center;
    }

    .profile-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-right: 12px;
    }

    .top-bar-left span {
      font-size: 18px;
      font-weight: bold;
    }

    /* Politeknik Logo */
    .politeknik-logo {
      position: absolute;
      top: -8px;
      right: 24px;
      max-width: 200px;
      height: auto;
      object-fit: contain;
    }

    .container {
      display: flex;
      height: calc(100vh - 140px);
      background-color: transparent;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #F0F0F0;
      color: black;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
      border-right: 3px solid black;
    }

    .sidebar button {
      background: transparent;
      border: 2px solid #BDC3C7;
      color: black;
      font-size: 18px;
      padding: 15px;
      text-align: left;
      width: 100%;
      margin-bottom: 10px;
      cursor: pointer;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .sidebar button:hover {
      background-color: #D3D3D3;
      border-color: #A9A9A9;
      color: #333;
    }

    /* Main Content */
    .main-content {
      flex-grow: 1;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      border: 1px solid #ddd;
      margin: 20px;
    }

    .header {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .profile-pic {
      width: 111px;
      height: 111px;
      border-radius: 50%;
      background-color: #d9d9d9;
      margin-right: 20px;
    }

    .bg-image {
      flex-grow: 1;
      display: flex;
      padding: 20px;
      flex-wrap: wrap;
      justify-content: space-between;
      overflow: hidden;
      background-image: url('images/HomeBack.png');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .box-button:hover {
      background-color: #D1D1D1;
      transform: scale(1.05);
    }

    .box-button:active {
      transform: scale(0.98);
    }

    /* Other Boxes */
    .box {
      width: 48%;
      height: 243.54px;
      background: rgba(217, 217, 217, 0.8);
      outline: 1px solid #333333; /* Darker outline color */
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: black;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.1s ease;
      border-radius: 5px;
    }

    .box:hover {
      background-color: #D1D1D1;
      transform: scale(1.05);
    }

    .box:active {
      transform: scale(0.98);
    }

    .left-section {
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: space-between;
    }

    /* SkillKit Logo */
    .bottom-logo {
      margin-top: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0;
    }

    .bottom-logo img {
      width: 200px;
      height: auto;
    }

    .page-title {
      font-size: 48px;
      margin-bottom: 20px;
    }

    .logs-container {
      background-color: #D9D9D9;
      padding: 20px;
      margin-top: 20px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    .logs-container h2 {
      margin-top: 0; /* Remove any top margin */
      padding-top: 0; /* Remove any top padding */
    }

    .log-header {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 20px;
      font-weight: bold;
      padding-bottom: 10px;
      border-bottom: 1px solid #ffffff;
      background-color: #848484;
    }

    .log-item-box {
      text-align: center;
    }

    .log-item {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 20px;
      padding: 15px;
      border-bottom: 1px solid #333333; /* Darker border color */
    }

    .status-badge {
      padding: 5px 10px;
      border-radius: 5px;
      color: #ffffff;
      font-weight: bold;
      text-align: center;
    }

    .status-completed {
      background-color: #4caf50;
    }

    .type-planned {
      background-color: #3693fc;
    }

    .type-bug-fix {
      background-color: #f2b228;
    }
  </style>
</head>
<body>
  <!-- Top Bar -->
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/LICH.jpg" alt="Profile Picture" class="profile-img"/>
      <span>Nurul Fatin Rozaime</span>
    </div>
  </div>

  <!-- Politeknik Logo -->
  <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo"/>

  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <a href="{{ route('homeadmin') }}">
          <button>Homepage</button>
        </a>
        <a href="{{ route('profileadmin') }}">
          <button>Profile</button>
        </a>
        <a href="{{ route('messageadmin') }}">
          <button>Message</button>
        </a>
        <a href="{{ route('accountadmin') }}">
          <button>Account</button>
        </a>
        <a href="{{ route('reportfeedbackadmin') }}">
          <button>Report & Feedbacks</button>
        </a>
        <a href="{{ route('aboutusadmin') }}">
          <button>About us</button>
        </a>
        <a href="{{ route('login') }}">
          <button>Log Out</button>
        </a>
      </div>
      <div class="bottom-logo">
        <img src="images/Logo.png" alt="SkillKit Logo"/>
      </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <h1 class="page-title">System Maintenance</h1>
      <div class="logs-container">
        <section class="logs-container">
          <h2>Logs and History:</h2>
          <div class="log-header">
            <span class="log-item-box">Date</span>
            <span class="log-item-box">Type</span>
            <span class="log-item-box">Status</span>
            <span class="log-item-box">Affected Pages</span>
            <span class="log-item-box">Description</span>
          </div>
          <div class="log-item">
            <span class="log-item-box">March 16, 2025<br />12:00 AM</span>
            <span class="log-item-box status-badge type-planned">Planned</span>
            <span class="log-item-box status-badge status-completed">Completed</span>
            <span class="log-item-box">About Us Page</span>
            <span class="log-item-box">Added a link to Instagram page</span>
          </div>
          <div class="log-item">
            <span class="log-item-box">March 9, 2025<br />1:00 AM</span>
            <span class="log-item-box status-badge type-planned">Planned</span>
            <span class="log-item-box status-badge status-completed">Completed</span>
            <span class="log-item-box">All Pages</span>
            <span class="log-item-box">Changed the default color scheme</span>
          </div>
          <div class="log-item">
            <span class="log-item-box">March 1, 2025<br />3:27 PM</span>
            <span class="log-item-box status-badge type-bug-fix">Bug Fix</span>
            <span class="log-item-box status-badge status-completed">Completed</span>
            <span class="log-item-box">All Pages</span>
            <span class="log-item-box">Fixed image loading issues</span>
          </div>
          <div class="log-item">
            <span class="log-item-box">March 1, 2025<br />12:00 PM</span>
            <span class="log-item-box status-badge type-planned">Planned</span>
            <span class="log-item-box status-badge status-completed">Completed</span>
            <span class="log-item-box">Admin System Maintenance</span>
            <span class="log-item-box">Created logs and history</span>
          </div>
        </section>
      </div>
    </div>
  </div>
</body>
</html>
