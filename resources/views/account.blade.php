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
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
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

    /* Sidebar Buttons */
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

    /* Main Content Area */
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

    /* Left Section (Password Change Form) */
    .left-section {
      width: 70%;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      align-items: center;
      justify-content: center;
    }

    .change-password-card {
      width: 100%;
      background: rgba(217, 217, 217, 0.8);
      outline: 1px black solid;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: black;
      padding: 20px;
      border-radius: 5px;
      flex-direction: column;
      text-align: center;
    }

    .change-password-card input {
      width: 80%;
      padding: 10px;
      margin: 10px 0;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #BDC3C7;
    }

    /* Save Button Styling */
    .save-button {
      width: 80%;
      padding: 12px;
      font-size: 16px;
      background-color: #BDC3C7; /* Gray color for the Save button */
      color: black;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .save-button:hover {
      background-color: #A9A9A9; /* Darker gray on hover */
    }

    /* Right Section (Notification and Calendar) */
    .right-section {
      width: 28%;
      display: flex;
      flex-direction: column;
      gap: 20px;
      border-left: 3px solid black;
      padding-left: 20px;
    }

    .notification-box {
      width: 100%;
      height: 60%;
      background: rgba(217, 217, 217, 0.8);
      outline: 1px black solid;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: black;
    }

    .calendar-box {
      width: 100%;
      height: 40%;
      background: rgba(217, 217, 217, 0.8);
      outline: 1px black solid;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: black;
    }

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

    /* Error Message Styling */
    .error-message {
      color: red;
      font-size: 16px;
      margin-top: 10px;
      display: none;
    }
  </style>
</head>
<body>
  <!-- Top Bar -->
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/FINN.png" alt="Profile Picture" class="profile-img"/>
      <span>Ampuan Muhammad Abdul Matin Bin Ampuan Shahmali</span>
    </div>
  </div>

  <!-- Politeknik Logo (Top Right) -->
  <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo"/>

  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Home Page Button -->
        <a href="{{ route('home') }}">
          <button>Homepage</button>
        </a>
        <!-- Profile Button -->
        <a href="{{ route('profile') }}">
          <button>Profile</button>
        </a>
        <!-- Message Button -->
        <a href="{{ route('message') }}">
          <button>Message</button>
        </a>
        <!-- Account Button -->
        <a href="{{ route('account') }}">
          <button>Account</button>
        <!-- Report & Feedbacks Button -->
        <a href="{{ route('reportfeedback') }}">
          <button>Report & Feedbacks</button>
        </a>
        <!-- About us Button -->
        <a href="{{ route('aboutus') }}">
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

    <!-- Main Content Area -->
    <div class="main-content">
      <!-- Left Section (Password Change Form) -->
      <div class="left-section">
        <div class="change-password-card">
          <h2>Change Password</h2>
          <form action="#" method="GET" id="changePasswordForm">
            <input type="password" name="old-password" id="oldPassword" placeholder="Old Password" required />
            <input type="password" name="new-password" id="newPassword" placeholder="New Password" required />
            <input type="password" name="confirm-password" id="confirmPassword" placeholder="Confirm Password" required />
            <button type="button" class="save-button" id="saveButton">SAVE</button>
          </form>
          <div class="error-message" id="errorMessage">Please fill in all fields.</div>
        </div>
      </div>

      <!-- Right Section (Notification and Calendar) -->
      <div class="right-section">
        <div class="notification-box">Notification</div>
        <div class="calendar-box">Calendar</div>
      </div>
    </div>
  </div>

  <script>
    // When SAVE button is pressed, check if all fields are filled
    document.getElementById('saveButton').addEventListener('click', function() {
      var oldPassword = document.getElementById('oldPassword').value;
      var newPassword = document.getElementById('newPassword').value;
      var confirmPassword = document.getElementById('confirmPassword').value;

      if (oldPassword === "" || newPassword === "" || confirmPassword === "") {
        // Display error message if fields are empty
        document.getElementById('errorMessage').style.display = 'block';
      } else {
        // Hide error message and route to the login page if fields are filled
        document.getElementById('errorMessage').style.display = 'none';
        window.location.href = "{{ route('login') }}";  // Route to login page
      }
    });

    // When LOG OUT button is pressed, route to the login page
    document.getElementById('logoutButton').addEventListener('click', function() {
      window.location.href = "{{ route('login') }}";  // Route to login page
    });
  </script>
</body>
</html>
