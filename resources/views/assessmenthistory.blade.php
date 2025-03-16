<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assessment History - SkillKit Dashboard</title>
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

    .right-section {
      width: 28%;
      display: flex;
      flex-direction: column;
      gap: 20px;
      border-left: 3px solid black;
      padding-left: 20px;
    }

    .assessment-history {
      background: white;
      outline: 1px black solid;
      padding: 20px;
      border-radius: 15px;
      width: 80%;
      margin-left: 20px;
      margin-top: 20px;
    }

    .assessment-history h2 {
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 25px;
      text-align: left;
    }

    .assessment-history .dropdown {
      position: relative;
      display: inline-block;
      width: 100%;
      margin-bottom: 15px;
    }

    .assessment-history .dropdown button {
      background-color: #3498db;
      color: white;
      font-size: 18px;
      padding: 10px;
      border: none;
      width: 100%;
      text-align: left;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .assessment-history .dropdown button:hover {
      background-color: #2980b9;
      color: white;
    }

    .assessment-history .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
      padding: 10px;
      border-radius: 5px;
    }

    .assessment-history .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .assessment-history .dropdown-content a:hover {
      background-color: #ddd;
    }

    .pass {
      background-color: #28a745;
      color: white;
      padding: 10px;
      border-radius: 5px;
      margin: 5px 0;
    }

    .fail {
      background-color: #dc3545;
      color: white;
      padding: 10px;
      border-radius: 5px;
      margin: 5px 0;
    }

    /* Notification & Calendar Styles */
    .notification-box, .calendar-box {
      background: white;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .notification-box h2, .calendar-box h2 {
      font-size: 22px;
      margin-bottom: 15px;
    }

    .notification-box ul, .calendar-box ul {
      list-style-type: none;
      padding: 0;
    }

    .notification-box li, .calendar-box li {
      padding: 10px;
      margin: 5px 0;
      border-bottom: 1px solid #f0f0f0;
    }

    .bottom-logo {
      margin-top: 10px; /* Reduced margin-top to move the logo higher */
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0; /* Add some padding above the logo */
    }

    .bottom-logo img {
      max-width: 200px; /* Slightly increased logo size */
      height: auto;
    }

    .contact-info {
      display: flex;
      gap: 35px;
      margin-top: 20px;
      justify-content: center;
      align-items: center;
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

     /* Calendar Styles */
     .calendar-box {
      background: white;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .calendar-box h2 {
      font-size: 22px;
      margin-bottom: 15px;
    }

    .calendar {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 5px;
      text-align: center;
    }

    .calendar .day {
      padding: 10px;
      background-color: #f1f1f1;
      border-radius: 5px;
    }

    .calendar .event {
      background-color: #3498db;
      color: white;
      padding: 5px;
      border-radius: 5px;
      font-size: 12px;
    }

    .calendar .today {
      background-color: #2980b9;
      color: white;
    }
  </style>  
</head>
<body>
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/FINN.png" alt="Profile Picture" class="profile-img"/>
      <span>Ampuan Muhammad Abdul Matin Bin Ampuan Shahmali</span>
    </div>
  </div>

  <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo"/>

  <div class="container">
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

    <div class="main-content">
      <div class="left-section">
        <div class="assessment-history">
          <h2>Assessment History</h2>

          <div class="dropdown">
            <button onclick="toggleDropdown('module1')">Module 1</button>
            <div id="module1" class="dropdown-content">
              <a href="#">2025-03-10 (Monday) - <span class="pass">PASS</span></a>
              <a href="#">2025-03-6 (Thursrday) - <span class="fail">FAIL</span></a>
            </div>
          </div>

          <div class="dropdown">
            <button onclick="toggleDropdown('module2')">Module 2</button>
            <div id="module2" class="dropdown-content">
              <a href="#">2025-03-12 (Wednesday) - <span class="pass">PASS</span></a>
              <a href="#">2025-03-8 (Saturday) - <span class="fail">FAIL</span></a>
            </div>
          </div>

          <div class="dropdown">
            <button onclick="toggleDropdown('module3')">Module 3</button>
            <div id="module3" class="dropdown-content">
              <a href="#">2025-03-4 (Tuesday) - <span class="pass">PASS</span></a>
              <a href="#">2025-03-1 (Saturday) - <span class="fail">FAIL</span></a>
            </div>
          </div>

          <div class="dropdown">
            <button onclick="toggleDropdown('module4')">Module 4</button>
            <div id="module4" class="dropdown-content">
              <a href="#">2025-02-27 (Thursday) - <span class="pass">PASS</span></a>
              <a href="#">2025-02-25 (Tuesday) - <span class="fail">FAIL</span></a>
            </div>
          </div>

          <div class="dropdown">
            <button onclick="toggleDropdown('module5')">Module 5</button>
            <div id="module5" class="dropdown-content">
              <a href="#">2025-02-10 (saturday) - <span class="pass">PASS</span></a>
              <a href="#">2025-02-8 (Monday) - <span class="fail">FAIL</span></a>
            </div>
          </div>
          
        </div>
      </div>
      
      <div class="right-section">
        <!-- Notification Box -->
        <div class="notification-box">
          <h2>Notifications</h2>
          <ul>
            <li>New module assessment scheduled for 2025-03-15</li>
            <li>Your report has been reviewed</li>
            <li>Reminder: Feedback submission deadline is approaching</li>
          </ul>
        </div>

       <!-- Calendar Box -->
       <div class="calendar-box">
          <h2>Upcoming Events</h2>
          <div class="calendar">
            <div class="day">Sun</div>
            <div class="day">Mon</div>
            <div class="day">Tue</div>
            <div class="day">Wed</div>
            <div class="day">Thu</div>
            <div class="day">Fri</div>
            <div class="day">Sat</div>

            <!-- Calendar days -->
            <div class="day">1</div>
            <div class="day">2</div>
            <div class="day">3</div>
            <div class="day">4</div>
            <div class="day">5</div>
            <div class="day event">6</div>
            <div class="day event">7</div>
            <div class="day">8</div>
            <div class="day">9</div>
            <div class="day">10</div>
            <div class="day event today">11</div>
            <div class="day">12</div>
            <div class="day event">13</div>
            <div class="day">14</div>
            <div class="day event">15</div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function toggleDropdown(moduleId) {
      // Close all dropdowns
      document.querySelectorAll('.dropdown-content').forEach(function(el) {
        if (el.id !== moduleId) {
          el.style.display = "none";
        }
      });

      // Toggle the clicked dropdown
      var content = document.getElementById(moduleId);
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    }
  </script>
</body>
</html>
