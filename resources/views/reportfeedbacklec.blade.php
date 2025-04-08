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

    /* Left Section (Report and Feedback Form) */
    .left-section {
      width: 70%;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      align-items: center;
      justify-content: center;
    }

    .send-message-card {
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

    .send-message-card input,
    .send-message-card textarea {
      width: 80%;
      padding: 10px;
      margin: 10px 0;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #BDC3C7;
    }

    .send-message-card textarea {
      height: 150px;
      resize: none;
    }

    /* Send Button Styling */
    .send-button {
      width: 80%;
      padding: 12px;
      font-size: 16px;
      background-color: #BDC3C7;
      color: black;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .send-button:hover {
      background-color: #A9A9A9;
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

    /* Styling for the rating buttons */
    .rating-container {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .rating-button {
      padding: 10px 20px;
      font-size: 18px;
      background-color: #BDC3C7;
      border: none;
      color: black;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .rating-button:hover {
      background-color: #A9A9A9;
    }

    /* Active button state */
    .rating-button.active {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>
<body>
  <!-- Top Bar -->
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/JAKE.jpg" alt="Profile Picture" class="profile-img"/> <!-- Profile Picture -->
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
      <!-- Left Section (Report and Feedback Form) -->
      <div class="left-section">
        <div class="send-message-card">
          <h2>Report and Feedback</h2>
          <form id="feedbackForm">
            <!-- Rating System -->
            <label for="rating">Rate the website (1-10):</label>
            <div id="rating-container" class="rating-container">
              <button class="rating-button" type="button" data-value="1">1</button>
              <button class="rating-button" type="button" data-value="2">2</button>
              <button class="rating-button" type="button" data-value="3">3</button>
              <button class="rating-button" type="button" data-value="4">4</button>
              <button class="rating-button" type="button" data-value="5">5</button>
              <button class="rating-button" type="button" data-value="6">6</button>
              <button class="rating-button" type="button" data-value="7">7</button>
              <button class="rating-button" type="button" data-value="8">8</button>
              <button class="rating-button" type="button" data-value="9">9</button>
              <button class="rating-button" type="button" data-value="10">10</button>
            </div>
            
            <!-- Suggestions Field -->
            <textarea name="suggestions" id="suggestions" placeholder="Enter your suggestions" required></textarea>
            
            <button type="button" class="send-button" onclick="submitFeedback()">Submit Feedback</button>
          </form>
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
    // Get all the rating buttons
    const ratingButtons = document.querySelectorAll('.rating-button');

    ratingButtons.forEach(button => {
      button.addEventListener('click', function () {
        // Remove 'active' class from all buttons
        ratingButtons.forEach(b => b.classList.remove('active'));
        
        // Add 'active' class to the clicked button
        button.classList.add('active');
        
        // Set the rating value
        document.getElementById('rating').value = button.getAttribute('data-value');
      });
    });

    function submitFeedback() {
      var rating = document.querySelector('.rating-button.active');
      var suggestions = document.getElementById('suggestions').value;

      if (!rating || suggestions === "") {
        alert("Please fill out all the fields.");
        return false;
      }

      // If validation passes, show thank you message
      alert("Thank you for your feedback! Rating: " + rating.getAttribute('data-value') + "/10\nSuggestions: " + suggestions);

      // Clear the active class from all the rating buttons to reset the selection
      ratingButtons.forEach(button => button.classList.remove('active'));

      // Optional: You can clear the form or do something else here
      document.getElementById('feedbackForm').reset();  // This will reset the form fields
    }
  </script>
</body>
</html>
