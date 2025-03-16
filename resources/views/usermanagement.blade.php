<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Skill Assessment</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Lexend, sans-serif;
      overflow-x: hidden; /* Disable horizontal scrolling */
      overflow-y: hidden; /* Disable vertical scrolling */
      position: relative;
      opacity: 0;
      animation: fadeIn 1.5s ease-in-out forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
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
      top: -20px; /* Adjusted logo upwards */
      right: 24px;
      max-width: 200px;
      height: auto;
      object-fit: contain;
    }

    .container {
      display: flex;
      height: calc(100vh - 140px);
      background-color: transparent;
      overflow: hidden; /* Ensure the container does not scroll */
    }

    .sidebar {
      width: 250px;
      background-color: #F0F0F0;
      color: black;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: flex-start; /* Align items to the top of the sidebar */
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

    .main-content {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      padding: 20px;
      gap: 20px;
      background-image: url('images/HomeBack.png');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      height: 100%;
      overflow: hidden; /* Prevent vertical scrolling */
    }

    .skills-assessment-box {
      background: rgba(217, 217, 217, 0.8);
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 20px;
      width: 100%; /* Full width */
      height: calc(100% - 80px); /* Take most of the space minus a little at the bottom */
      box-sizing: border-box;
      position: relative;
      overflow-y: auto;
    }

    .input-box-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 15px;
    }

    .input-box-group label {
      font-weight: bold;
      margin-bottom: 5px; /* Space between label and input box */
    }

    .input-box-group input {
      font-size: 16px;
      padding: 10px;
      border-radius: 5px;
      border: 2px solid #BDC3C7;
      width: 95%; /* Reduced width to avoid touching the edges */
      margin-bottom: 10px;
    }

    .input-box-group .short-input {
      width: 48%; /* Shorter input */
    }

    .checkbox-group {
      display: flex;
      flex-direction: column;
    }

    .checkbox-group label {
      margin-bottom: 10px;
    }

    .checkbox-group input {
      margin-right: 10px;
    }

    .feedback-container {
      width: 32%; /* Same width as Student ID input box */
      height: 500px; /* Increased height to be taller than the skills assessment box */
      margin-top: 10px; /* Space between the Student ID input box and the feedback box */
    }

    textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 2px solid #BDC3C7;
      height: 100%; /* Make textarea fill the entire height */
      box-sizing: border-box; /* Ensure padding and border don't overflow */
    }

    .submit-btn {
      display: none; /* Removed submit button */
    }

    .score-container {
      display: none; /* Removed score container */
    }

    .status-box {
      display: none; /* Removed status box */
    }

    .delete-btn,
    .add-btn {
      font-size: 22px; /* Increased button font size */
      padding: 20px 40px; /* Increased padding */
      border-radius: 10px; /* Rounded corners */
      cursor: pointer;
      width: 170px; /* Increased button width */
      text-align: center;
    }

    .delete-btn {
      background-color: red;
      color: white;
    }

    .add-btn {
      background-color: green;
      color: white;
    }

    .action-buttons {
      position: absolute;
      bottom: 20px;
      right: 20px;
      display: flex;
      gap: 20px;
    }

    /* SkillKit Logo */
    .bottom-logo {
      margin-top: auto; /* Pushes the logo to the bottom */
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0;
    }

    .bottom-logo img {
      max-width: 100%; /* Makes sure the logo scales properly */
      height: auto; /* Maintain aspect ratio */
    }

  </style>
</head>
<body>
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/lich.jpg" alt="Profile Picture" class="profile-img"/>
      <span>Nurul Fatin Rozaime</span>
    </div>
  </div>

  <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo"/>

  <div class="container">
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
      <div class="bottom-logo">
        <img src="images/Logo.png" alt="SkillKit Logo"/>
      </div>
    </div>

    <div class="main-content">
      <div class="skills-assessment-box">
        <div class="input-box-group">
          <label for="name">NAME</label>
          <input type="text" id="name" name="name" placeholder="Enter Name">
        </div>

        <div class="input-box-group">
          <label for="email">EMAIL ADDRESS</label>
          <input type="email" id="email" name="email" placeholder="Enter Email Address">
        </div>

        <div class="input-box-group">
          <label for="course">COURSE</label>
          <input type="text" id="course" name="course" placeholder="Enter Course" class="short-input">
        </div>

        <div class="input-box-group">
          <label for="group-code">GROUP CODE</label>
          <input type="text" id="group-code" name="group-code" placeholder="Enter Group Code" class="short-input">
        </div>

        <div class="input-box-group">
          <label for="role">ROLE</label>
          <input type="text" id="role" name="role" placeholder="Enter Role" class="short-input">
        </div>

        <!-- Action buttons for DELETE and ADD -->
        <div class="action-buttons">
          <button class="delete-btn" onclick="handleDelete()">DELETE</button>
          <button class="add-btn" onclick="handleAdd()">ADD</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function handleAdd() {
      // Check if all fields are filled out
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const course = document.getElementById('course').value;
      const groupCode = document.getElementById('group-code').value;
      const role = document.getElementById('role').value;

      if (!name || !email || !course || !groupCode || !role) {
        alert('Please fill in all the fields before adding.');
      } else {
        alert('Form submitted!');
        // You can add the logic to save the data here
      }
    }

    function handleDelete() {
      if (confirm('Are you sure you want to delete the form data?')) {
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('course').value = '';
        document.getElementById('group-code').value = '';
        document.getElementById('role').value = '';
      }
    }
  </script>
</body>
</html>
