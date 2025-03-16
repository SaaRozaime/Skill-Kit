<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SkillKit Practice Mode</title>
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

    select, .checkbox-group {
      font-size: 16px;
      padding: 10px;
      margin-top: 5px;
    }

    .checkbox-group {
      display: flex;
      flex-direction: column;
    }

    .checkbox-group input {
      margin-right: 10px;
    }

    .reset-btn {
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

    .reset-btn:hover {
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
      <!-- Form Section -->
      <div class="form-section">
        <label for="subject">Select Subject:</label>
        <select id="subject" name="subject" onchange="updateSkills()">
          <option value="midwifery">Midwifery</option>
          <option value="cardiovascular-technology">Cardiovascular Technology</option>
          <option value="nursing">Nursing</option>
          <option value="paramedic">Paramedic</option>
          <option value="public-health">Public Health</option>
        </select>

        <label for="skills">Select Skills:</label>
        <div class="checkbox-group" id="skills">
          <!-- Dynamic skill options will be injected here based on subject -->
        </div>

        <button class="reset-btn" onclick="resetSelections()">Reset</button>
      </div>
    </div>
  </div>

  <script>
    function updateSkills() {
      const subject = document.getElementById("subject").value;
      const skillsContainer = document.getElementById("skills");
      
      // Clear existing skills
      skillsContainer.innerHTML = '';

      const skills = getSkillsForSubject(subject);
      skills.forEach(skill => {
        const skillDiv = document.createElement('div');
        skillDiv.innerHTML = `
          <input type="checkbox" id="${skill}" name="skills" value="${skill}">
          <label for="${skill}">${capitalizeFirstLetter(skill.replace(/-/g, ' '))}</label>
        `;
        skillsContainer.appendChild(skillDiv);
      });
    }

    function getSkillsForSubject(subject) {
      switch(subject) {
        case 'midwifery':
          return ['antenatal-care', 'delivery-assistance', 'postnatal-care', 'breastfeeding-support', 'maternal-monitoring', 'newborn-care', 'family-planning'];
        case 'cardiovascular-technology':
          return ['ecg-monitoring', 'echocardiography', 'stress-testing', 'cardiac-catheterization', 'cardiac-rehabilitation', 'blood-pressure-monitoring', 'vascular-ultrasound'];
        case 'nursing':
          return ['patient-bathing', 'vital-signs-check', 'medication-administration', 'wound-dressing', 'patient-education', 'bedside-care', 'emergency-response'];
        case 'paramedic':
          return ['patient-assessment', 'first-aid', 'trauma-care', 'patient-transport', 'airway-management', 'cardiac-arrest-management', 'medical-equipment-use'];
        case 'public-health':
          return ['epidemiology', 'health-survey-analysis', 'disease-prevention', 'community-health-promotion', 'environmental-health', 'vaccination-programs', 'health-policy-analysis'];
        default:
          return [];
      }
    }

    function capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function resetSelections() {
      const checkboxes = document.querySelectorAll('.checkbox-group input[type="checkbox"]');
      checkboxes.forEach(checkbox => checkbox.checked = false);
    }

    // Initialize skills on page load
    window.onload = updateSkills;
  </script>
</body>
</html>
