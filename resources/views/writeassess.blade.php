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
      overflow: hidden; /* Disable scrolling in both directions */
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
      max-height: calc(100vh - 140px);
    }

    .top-inputs {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin-bottom: 20px;
    }

    .top-inputs input {
      font-size: 16px;
      padding: 10px;
      border-radius: 5px;
      border: 2px solid #BDC3C7;
      width: 32%; /* Adjust width of the inputs */
    }

    .form-container {
      display: flex;
      justify-content: space-between;
      gap: 10px; /* Reduced the gap */
      width: 100%;
    }

    .skills-assessment-box {
      background: rgba(217, 217, 217, 0.8);
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 20px;
      width: 60%; /* Adjusted to fit properly */
      box-sizing: border-box;
      height: 400px; /* Height of the skills assessment box */
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

    .score-container {
      display: flex;
      justify-content: flex-start;
      align-items: center;
      gap: 20px;
      margin-top: 20px;
    }

    .score-container input {
      width: 60px;
      padding: 10px;
      border-radius: 5px;
      border: 2px solid #BDC3C7;
      font-size: 16px;
    }

    .status-box {
      display: inline-block;
      width: 70px;
      height: 30px;
      text-align: center;
      line-height: 30px;
      font-weight: bold;
      border-radius: 5px;
      color: white;
      margin-left: 15px;
    }

    .pass {
      background-color: green;
    }

    .fail {
      background-color: red;
    }

    .submit-btn {
      background-color: #FF6347;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 5px;
      width: 200px;
      margin-top: 20px;
    }

    .submit-btn:hover {
      background-color: #FF4500;
    }

      /* SkillKit Logo */
      .bottom-logo {
      margin-top: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0;
    }

  </style>
</head>
<body>
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/JAKE.jpg" alt="Profile Picture" class="profile-img"/>
      <span>Muhd Ilham bin Muhd Awang</span>
    </div>
  </div>

  <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo"/>

  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <a href="{{ route('homelec') }}">
          <button>Homepage</button>
        </a>
        <a href="{{ route('profilelec') }}">
          <button>Profile</button>
        </a>
        <a href="{{ route('messagelec') }}">
          <button>Message</button>
        </a>
        <a href="{{ route('accountlec') }}">
          <button>Account</button>
        </a>
        <a href="{{ route('reportfeedbacklec') }}">
          <button>Report & Feedbacks</button>
        </a>
        <a href="{{ route('aboutuslec') }}">
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

    <div class="main-content">
      <div class="top-inputs">
        <input type="text" id="assessment-name" name="assessment-name" placeholder="Assessment Name">
        <input type="text" id="group-code" name="group-code" placeholder="Group Code">
        <input type="text" id="student-id" name="student-id" placeholder="Student ID">
      </div>

      <div class="form-container">
        <div class="skills-assessment-box">
          <label for="checkbox-group">Skills Assessment:</label>
          <div class="checkbox-group" id="checkbox-group">
            <label><input type="checkbox" name="medical-hand-washing" value="medical-hand-washing"> Medical Hand Washing</label>
            <label><input type="checkbox" name="unoccupied-bed" value="unoccupied-bed"> Unoccupied Bed</label>
            <label><input type="checkbox" name="wound-dressing" value="wound-dressing"> Wound Dressing</label>
            <label><input type="checkbox" name="patient-mobility" value="patient-mobility"> Patient Mobility</label>
            <label><input type="checkbox" name="first-aid" value="first-aid"> First Aid</label>
          </div>
        </div>

        <div class="feedback-container">
          <label for="feedback">Feedback:</label>
          <textarea id="feedback" name="feedback" placeholder="Write your feedback here..."></textarea>
        </div>
      </div>

      <div class="score-container">
        <div>
          <label for="score">Score:</label>
          <div style="display: flex; align-items: center;">
            <input type="number" id="score" name="score" min="0" max="100" oninput="updatePassFail()">
            <div id="pass-fail-box" class="status-box">FAIL</div>
          </div>
        </div>
      </div>

      <button class="submit-btn">Submit</button>
    </div>
  </div>

  <script>
    function updatePassFail() {
      const score = document.getElementById("score").value;
      const passFailBox = document.getElementById("pass-fail-box");

      if (score === "") {
        passFailBox.textContent = "FAIL";
        passFailBox.classList.remove("pass");
        passFailBox.classList.add("fail");
      } else if (score >= 100) {
        passFailBox.textContent = "PASS";
        passFailBox.classList.remove("fail");
        passFailBox.classList.add("pass");
      } else {
        passFailBox.textContent = "FAIL";
        passFailBox.classList.remove("pass");
        passFailBox.classList.add("fail");
      }
    }

    updatePassFail();
  </script>
</body>
</html>
