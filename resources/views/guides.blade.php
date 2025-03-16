<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guides & Resources</title>
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
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

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

    /* Bottom Logo */
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

    /* Dropdown Search */
    .search-box {
      margin-bottom: 20px;
    }

    .search-box select {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #BDC3C7;
    }

    .description {
      background: rgba(217, 217, 217, 0.8);
      padding: 20px;
      border-radius: 5px;
      font-size: 16px;
      color: black;
      margin-top: 20px;
    }

    .description a {
      color: #3498db;
      text-decoration: none;
    }

    .description a:hover {
      text-decoration: underline;
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
      <!-- Left Section -->
      <div class="left-section">
        <!-- Dropdown Search for Skills -->
        <div class="search-box">
          <select id="skillSelect" onchange="showSkillDetails()">
            <option value="" disabled selected>Select Skill</option>
            <option value="patientBathing">Patient Bathing</option>
            <option value="vitalSigns">Vital Signs Check</option>
            <option value="medicationAdmin">Medication Administration</option>
            <option value="woundDressing">Wound Dressing</option>
            <option value="patientEducation">Patient Education</option>
            <option value="bedsideCare">Bedside Care</option>
            <option value="emergencyResponse">Emergency Response</option>
          </select>
        </div>

        <!-- Tutorial Description -->
        <div id="skillDescription" class="description">
          <h2>Select a skill to view the tutorial</h2>
          <p>Once a skill is selected from the dropdown above, you will see the description and a link to the tutorial.</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    function showSkillDetails() {
      const skill = document.getElementById("skillSelect").value;
      const descriptionDiv = document.getElementById("skillDescription");
      
      const skills = {
        patientBathing: {
          description: "This skill covers the step-by-step process for assisting patients with bathing. Follow the tutorial for the best practices.",
          link: "patient_bathing_tutorial_link"
        },
        vitalSigns: {
          description: "Learn how to properly check a patient's vital signs, including blood pressure, heart rate, and temperature.",
          link: "vital_signs_tutorial_link"
        },
        medicationAdmin: {
          description: "Understand the process of administering medication, including dosage calculation and safety measures.",
          link: "medication_admin_tutorial_link"
        },
        woundDressing: {
          description: "Master the steps to properly dress and care for wounds, ensuring infection prevention and patient comfort.",
          link: "wound_dressing_tutorial_link"
        },
        patientEducation: {
          description: "Learn how to effectively educate patients about their health conditions and treatment plans.",
          link: "patient_education_tutorial_link"
        },
        bedsideCare: {
          description: "This tutorial helps you master bedside care techniques, focusing on patient comfort and safety.",
          link: "bedside_care_tutorial_link"
        },
        emergencyResponse: {
          description: "Review emergency response procedures, including CPR, first aid, and critical care interventions.",
          link: "emergency_response_tutorial_link"
        }
      };

      if (skills[skill]) {
        descriptionDiv.innerHTML = `
          <h2>${skills[skill].description}</h2>
          <p>For detailed instructions, please click on the tutorial link below:</p>
          <a href="${skills[skill].link}" target="_blank">Start the tutorial</a>
        `;
      } else {
        descriptionDiv.innerHTML = `
          <h2>Select a skill to view the tutorial</h2>
          <p>Once a skill is selected from the dropdown above, you will see the description and a link to the tutorial.</p>
        `;
      }
    }
  </script>
</body>
</html>
