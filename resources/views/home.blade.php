<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SkillKit Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
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
      position: relative;
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

    /* Logout button in sidebar */
    .logout-form {
      width: 100%;
    }

    .sidebar-button {
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

    .sidebar-button:hover {
      background-color: #D3D3D3;
      border-color: #A9A9A9;
      color: #333;
    }

    /* Main Content */
    .main-content {
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

    /* Left Section */
    .left-section {
      width: 70%;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    /* Practice Mode - Button */
    .box-link {
      display: block;
      width: 48%;
      height: 243.54px;
    }

    .box-button {
      width: 100%;
      height: 100%;
      background: rgba(217, 217, 217, 0.8);
      outline: 1px black solid;
      font-size: 20px;
      font-weight: 400;
      color: black;
      cursor: pointer;
      border-radius: 5px;
      border: none;
      transition: background 0.3s ease, transform 0.1s ease;
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
      outline: 1px black solid;
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

    /* Right Section */
    .right-section {
      width: 28%;
      display: flex;
      flex-direction: column;
      gap: 20px;
      border-left: 3px solid black;
      padding-left: 20px;
    }

    .notification-box, .calendar-box {
      width: 100%;
      background: rgba(217, 217, 217, 0.8);
      outline: 1px black solid;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: black;
    }

    .notification-box { height: 60%; }
    .calendar-box { height: 40%; }

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
  </style>
</head>
<body>
  <!-- Top Bar -->
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/FINN.png" alt="Profile" class="profile-img">
      <span class="user-name">{{ Auth::user()->name }}</span>
    </div>
    <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo">
  </div>

  <div class="container">
    <!-- Sidebar -->
    <x-sidebar />

    <!-- Main Content -->
    <div class="main-content">
      <!-- Left Section -->
      <div class="left-section">
        <a href="{{ route('practicemode') }}" class="box-link">
          <button class="box-button">Practice Mode</button>
        </a>
        <a href="{{ route('schedule') }}" class="box-link"> 
          <button class="box-button">Assessment Schedule</button>
        </a>
        <a href="{{ route('guides') }}" class="box-link">
          <button class="box-button">Guides & Resources</button>
        </a>
        <a href="{{ route('searchlibrary') }}" class="box-link"> 
          <button class="box-button">Search Library</button>
        </a>
        <a href="{{ route('assessmenthistory') }}" class="box-link"> 
          <button class="box-button">Assessment History</button>
        </a>
      </div>

      <!-- Right Section -->
      <div class="right-section">
        <div class="notification-box">Notification</div>
        <div class="calendar-box">Calendar</div>
      </div>
    </div>
  </div>

  <script>
    // Add CSRF token to all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
</body>
</html>
