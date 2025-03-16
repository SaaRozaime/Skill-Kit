<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assessment Schedule</title>
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
      flex-direction: column;
      gap: 20px;
      overflow: hidden;
      background-image: url('images/HomeBack.png');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .form-section {
      width: 100%;
      background: rgba(217, 217, 217, 0.8);
      padding: 20px;
      border-radius: 5px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .form-section label {
      font-size: 18px;
      font-weight: bold;
    }

    /* Calendar Layout */
    .calendar {
      margin-top: 30px;
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      grid-gap: 10px;
      padding: 10px;
      grid-auto-rows: minmax(100px, auto);
      border: 2px solid #ddd;
      background-color: #fff;
      border-radius: 5px;
    }

    .calendar .day {
      background-color: #fff;
      padding: 20px;
      text-align: center;
      border: 1px solid #ddd;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
      position: relative; /* Needed for positioning the popup */
    }

    .calendar .day:hover {
      background-color: #e0e0e0;
    }

    .calendar .day:active {
      background-color: #d3d3d3;
    }

    .calendar .day.empty {
      background-color: transparent;
      pointer-events: none;
    }

    /* Day Details Popup */
    .day-details {
      display: none;
      background-color: #f9f9f9;
      padding: 15px;
      position: absolute;
      top: -5px; /* Adjust to position over the day box */
      left: 0;
      width: 200px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
      z-index: 10;
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
      <img src="images/FINN.png" alt="Profile Picture" class="profile-img"/>
      <span>Ampuan Muhammad Abdul Matin Bin Ampuan Shahmali</span>
    </div>
  </div>

  <!-- Politeknik Logo -->
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
        </a>
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

    <!-- Main Content -->
    <div class="main-content">
      <div class="calendar" id="calendar">
        <!-- Days of the week -->
        <div class="day">Mon</div>
        <div class="day">Tue</div>
        <div class="day">Wed</div>
        <div class="day">Thu</div>
        <div class="day">Fri</div>
        <div class="day">Sat</div>
        <div class="day">Sun</div>

        <!-- Calendar days (1 to 31) will be added here -->
      </div>

      <div id="details-popup" class="day-details">
        <h3 id="details-title">Assessment: Monthly Check up</h3>
        <p id="details-content">Mentor: Sir Ilham</p>
        <p id="details-venue">Venue: Lab 01</p>
        <p id="details-time">Time: 3:00 pm</p>
      </div>
    </div>
  </div>

  <script>
    const medicalEvents = [
      { title: 'Monthly Checkup', mentor: 'Dr. Sarah', venue: 'Room 202', time: '10:00 am' },
      { title: 'First Aid Training', mentor: 'Dr. John', venue: 'Room 305', time: '2:00 pm' },
      { title: 'Surgical Skills Workshop', mentor: 'Dr. Patel', venue: 'Room 404', time: '11:00 am' },
      { title: 'Emergency Medicine Simulation', mentor: 'Dr. Williams', venue: 'Room 100', time: '1:00 pm' },
      { title: 'Radiology Review', mentor: 'Dr. Kim', venue: 'Room 302', time: '9:00 am' }
    ];

    const calendarDays = document.querySelector('.calendar');
    const numDays = 31; // Number of days to display

    // Assign a unique event for each day
    const dayEvents = [];
    for (let i = 1; i <= numDays; i++) {
      // Assign each day a random event (or you can specify one event per day manually)
      dayEvents.push(medicalEvents[Math.floor(Math.random() * medicalEvents.length)]);
    }

    // Create the days in the calendar
    for (let i = 1; i <= numDays; i++) {
      const dayDiv = document.createElement('div');
      dayDiv.classList.add('day');
      dayDiv.innerText = i;

      // Add mouseover event to show details
      dayDiv.onmouseover = function () {
        showDetails(i, dayDiv);
      };

      // Add click event to keep the popup visible
      dayDiv.onclick = function () {
        if (currentHoveredDay === i) {
          hideDetails();
        } else {
          showDetails(i, dayDiv);
        }
      };

      calendarDays.appendChild(dayDiv);
    }

    let currentHoveredDay = null;

    function showDetails(day, dayElement) {
      if (currentHoveredDay === day) return; // Prevent re-triggering for the same day
      currentHoveredDay = day;

      const eventData = dayEvents[day - 1]; // Get the event for this specific day
      const detailsPopup = document.getElementById('details-popup');
      document.getElementById('details-title').innerText = `Assessment on Day ${day}`;
      document.getElementById('details-content').innerText = `Event: ${eventData.title}`;
      document.getElementById('details-venue').innerText = `Mentor: ${eventData.mentor}`;
      document.getElementById('details-time').innerText = `Venue: ${eventData.venue}`;

      // Position the popup above the day box
      const rect = dayElement.getBoundingClientRect();
      detailsPopup.style.display = 'block';
      detailsPopup.style.top = `${rect.top - detailsPopup.offsetHeight}px`;
      detailsPopup.style.left = `${rect.left + (rect.width / 2) - (detailsPopup.offsetWidth / 2)}px`;
    }

    function hideDetails() {
      const detailsPopup = document.getElementById('details-popup');
      detailsPopup.style.display = 'none';
      currentHoveredDay = null;
    }
  </script>
</body>
</html>
