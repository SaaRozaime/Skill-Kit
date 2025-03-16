<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SkillKit Dashboard</title>
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
      <img src="images/JAKE.jpg" alt="Profile Picture" class="profile-img"/>
      <span>Muhd Ilham bin Muhd Awang</span>
    </div>
  </div>

  <!-- Politeknik Logo -->
  <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo"/>

  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Home Page Button -->
        <a href="{{ route('homelec') }}">
          <button>Homepage</button>
        </a>
        <!-- Profile Button -->
        <a href="{{ route('profilelec') }}">
          <button>Profile</button>
        </a>
        <!-- Message Button -->
        <a href="{{ route('messagelec') }}">
          <button>Message</button>
        </a>
        <!-- Account Button -->
        <a href="{{ route('accountlec') }}">
          <button>Account</button>
        </a>
        <!-- Report & Feedbacks Button -->
        <a href="{{ route('reportfeedbacklec') }}">
          <button>Report & Feedbacks</button>
        </a>
        <!-- About us Button -->
        <a href="{{ route('aboutuslec') }}">
          <button>About us</button>
        </a>
        <!-- Log Out Button -->
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
      <!-- Left Section -->
      <div class="left-section">
        <a href="{{ route('createassess') }}" class="box-link">
          <button class="box-button">Create Skill Assessment</button>
        </a>
        <a href="{{ route('writeassess') }}" class="box-link">
          <button class="box-button">Write Assessments</button>
        </a>
        <a href="{{ route('track') }}" class="box-link">
          <button class="box-button">Student Performance Tracking</button>
        </a>
        <a href="{{ route('addskill') }}" class="box-link">
          <button class="box-button">Adding Skill</button>
        </a>
      </div>

      <!-- Right Section -->
      <div class="right-section">
        <div class="notification-box">Notification</div>
        <div class="calendar-box">Calendar</div>
      </div>
    </div>
  </div>
</body>
</html>
