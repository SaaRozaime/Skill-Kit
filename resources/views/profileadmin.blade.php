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
      overflow: hidden; /* Prevent scrolling */
      position: relative; /* Allow absolute positioning within the page */
      opacity: 0; /* Set initial opacity to 0 */
      animation: fadeIn 1.5s ease-in-out forwards; /* Fade-in animation */
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
      height: 140px; /* Increased height for more space to fit the logo */
      background-color: #F0F0F0; /* Off-white color */
      color: black; /* Darker text for contrast */
      display: flex;
      justify-content: space-between; /* This ensures the left and right are aligned */
      align-items: center;
      padding: 0 24px; /* Adjusted padding */
      position: relative; /* Make it a relative container for absolute positioning */
      border-bottom: 3px solid black; /* Line divider between top bar and content (black) */
    }

    .top-bar-left {
      display: flex;
      align-items: center;
    }

    .profile-img {
      width: 100px; /* Increased profile image size */
      height: 100px; /* Increased profile image size */
      border-radius: 50%;
      margin-right: 12px; /* Adjusted margin */
    }

    .top-bar-left span {
      font-size: 18px; /* Adjusted font size */
      font-weight: bold;
    }

    /* Politeknik Logo (absolute position at the top-right) */
    .politeknik-logo {
      position: absolute;
      top: -8px; /* Adjusted to move the logo higher */
      right: 24px; /* Keep it a bit from the right edge */
      max-width: 200px; /* Made logo 10% smaller */
      height: auto;
      object-fit: contain; /* Ensures logo scales without distortion */
    }

    .container {
      display: flex;
      height: calc(100vh - 140px); /* Adjust container height to account for the bigger top bar */
      background-color: transparent; /* Make the container background transparent to let the image show through */
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #F0F0F0; /* Off-white color */
      color: black; /* Darker text for contrast */
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between; /* Ensures content is spread out */
      height: 100%;
      border-right: 3px solid black; /* Line divider between sidebar and content (black) */
      position: relative; /* Required for absolute positioning of SkillKit logo */
    }

    /* Sidebar Buttons */
    .sidebar button {
      background: transparent;
      border: 2px solid #BDC3C7; /* Light gray border */
      color: black; /* Darker text for contrast */
      font-size: 18px;
      padding: 15px;
      text-align: left;
      width: 100%;
      margin-bottom: 10px;
      cursor: pointer;
      border-radius: 5px; /* Add rounded corners to the button */
      transition: all 0.3s ease; /* Smooth transition for hover effects */
    }

    /* Change the hover color to gray */
    .sidebar button:hover {
      background-color: #D3D3D3; /* Gray background on hover */
      border-color: #A9A9A9; /* Slightly darker gray for border */
      color: #333; /* Darker text color */
    }

    /* Main Content Area */
    .main-content {
      flex-grow: 1;
      display: flex;
      padding: 20px;
      flex-wrap: wrap; /* Allow wrapping in case of space */
      justify-content: space-between;
      overflow: hidden;
      background-image: url('images/HomeBack.png'); /* Set your background image here */
      background-size: cover; /* Ensure the background covers the whole page */
      background-position: center; /* Center the image */
      background-attachment: fixed; /* Make sure the background stays fixed when scrolling */
    }

    /* Left Section (Profile Card) */
    .left-section {
      width: 70%; /* Take the majority of the space */
      display: flex;
      flex-wrap: wrap; /* Allow wrapping */
      gap: 20px;
      align-items: center;
      justify-content: center; /* Center the content inside */
    }

    .profile-card {
      width: 100%;
      background: rgba(217, 217, 217, 0.8); /* Slight transparency */
      outline: 1px black solid;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: black;
      padding: 20px;
      border-radius: 5px; /* Slightly rounded corners */
      flex-direction: column;
      text-align: center;
    }

    .profile-card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-bottom: 20px;
    }

    .profile-card h2 {
      margin: 10px 0;
    }

    .profile-card p {
      font-size: 16px;
      color: gray;
    }

    /* Right Section (Notification and Calendar) */
    .right-section {
      width: 28%; /* Take the remaining space */
      display: flex;
      flex-direction: column;
      gap: 20px;
      border-left: 3px solid black; /* Divider between Notification and Calendar */
      padding-left: 20px; /* Add padding to the left side to align content properly */
    }

    /* Smaller Notification Box */
    .notification-box {
      width: 100%;
      height: 60%; /* Make Notification bigger */
      background: rgba(217, 217, 217, 0.8); /* Slight transparency */
      outline: 1px black solid;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: black;
    }

    /* Smaller Calendar Box */
    .calendar-box {
      width: 100%;
      height: 40%; /* Make Calendar smaller */
      background: rgba(217, 217, 217, 0.8); /* Slight transparency */
      outline: 1px black solid;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: black;
    }

    /* SkillKit Logo Positioned Inside the Clear Space Under the Log Out Button */
    .bottom-logo {
      margin-top: 10px; /* Reduced margin-top to move the logo higher */
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0; /* Add some padding above the logo */
    }

    .bottom-logo img {
      width: 200px; /* Increased width for a bigger logo */
      height: auto; /* Maintain aspect ratio */
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

  <!-- Politeknik Logo (Top Right) -->
  <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo"/>

  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Home Page Button -->
        <a href="{{ route('homeadmin') }}">
          <button>Homepage</button>
        </a>
        <!-- Profile Button -->
        <a href="{{ route('profileadmin') }}">
          <button>Profile</button>
        </a>
        <!-- Message Button -->
        <a href="{{ route('messageadmin') }}">
          <button>Message</button>
        </a>
        <!-- Account Button -->
        <a href="{{ route('accountadmin') }}">
          <button>Account</button>
        <!-- Report & Feedbacks Button -->
        <a href="{{ route('reportfeedbackadmin') }}">
          <button>Report & Feedbacks</button>
        </a>
        <!-- About us Button -->
        <a href="{{ route('aboutusadmin') }}">
          <button>About us</button>
        </a>
        <!-- Log Out Button -->
        <a href="{{ route('login') }}">
          <button>Log Out</button>
        </a>
      </div>

      <!-- SkillKit Logo at the Bottom of Sidebar (after logout) -->
      <div class="bottom-logo">
        <img src="images/Logo.png" alt="SkillKit Logo"/>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
      <!-- Left Section (Profile Card) -->
      <div class="left-section">
        <div class="profile-card">
          <img src="images/LICH.jpg" alt="Profile Picture"/>
          <h2>Nurul Fatin Rozaime</h2>
          <p>Admin | Politeknik Brunei</p>
          <p><strong>ID:</strong> 23ADM1018</p>
          <p><strong>Department:</strong> SICT</p>
          <p><strong>Email Address:</strong> 23ADM1018@admin.pb.edu.bn</p>
          <p><strong>Role:</strong> Admin</p>
        </div>
      </div>

      <!-- Right Section (Notification and Calendar) -->
      <div class="right-section">
        <div class="notification-box">Notification</div>
        <div class="calendar-box">Calendar</div>
      </div>
    </div>
  </div>
</body>
</html>
