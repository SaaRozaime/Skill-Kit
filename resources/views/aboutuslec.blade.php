<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message - SkillKit Dashboard</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: sans-serif;
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

    .left-section {
      width: 70%;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .message-card {
      background: rgba(217, 217, 217, 0.8);
      outline: 1px black solid;
      padding: 20px;
      border-radius: 5px;
      margin-left: 20px;
    }

    .message-card h2 {
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .message-card p {
      font-size: 14px;
      color: black;
    }

    .contact-info {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .contact-info a {
      text-decoration: none;
      font-size: 20px;
      color: black;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .contact-info a:hover {
      color: #3498db;
    }

    .contact-info i {
      font-size: 22px;
    }

    .contact-info img {
      width: 25px;
      height: 25px;
      border-radius: 5px;
    }

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
  </style>
</head>
<body>
  <!-- Top Bar -->
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/JAKE.jpg" alt="Profile Picture Lecturer" class="profile-img"/>
      <span>Muhd Ilham bin Muhd Awang</span>
    </div>
  </div>

  <!-- Politeknik Logo (Top Right) -->
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

    <!-- Main Content Area -->
    <div class="main-content">
      <!-- Left Section (Message Card) -->
      <div class="left-section">
        <div class="message-card">
          <h2>About us</h2>
          <p>Welcome to SkillKit! We are dedicated to providing medical students with the tools they need to succeed in their studies. Our mission is to empower students by offering a range of features designed to help them stay on track and reach their academic goals.</p>
          <p>Here are some of the key features of our platform:</p>
          <ul>
            <li>Assessment Scheduling: Easily manage your upcoming assessments.</li>
            <li>Create Skill Assessment: Design and customize skill assessments for students.</li>
            <li>Write Assessment: Evaluate and provide feedback on student performance.</li>
            <li>Adding Skill: Add new skills to the assessment database for evaluation.</li>
            <li>Student Practice Performance: Track and analyze students' practice performance.</li>
          </ul>
          <p>We are committed to helping you navigate through your academic journey and achieve excellence in your field.</p>
          
          <div class="contact-info">
            <a href="https://www.instagram.com/skillkit.bn" target="_blank">
              <img src="images/Instagram.png" alt="Instagram Icon"/> <i class="fab fa-instagram"></i> skillkit.bn
            </a>
            <a href="tel:+6738268291">
              <img src="images/phone.png" alt="Phone Icon"/> <i class="fas fa-phone"></i> +673 826 8291
            </a>
            <a href="mailto:skillkit.bn@gmail.com">
              <img src="images/mail.png" alt="Email Icon"/> <i class="fas fa-envelope"></i> skillkit.bn@gmail.com
            </a>
          </div>
        </div>
      </div>

      <!-- Right Section (Notification and Calendar) -->
      <div class="right-section">
        <div class="notification-box">Notification</div>
        <div class="calendar-box">Calendar</div>
      </div>
    </div>
  </div>

  <!-- Font Awesome CDN (For Icons) -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
