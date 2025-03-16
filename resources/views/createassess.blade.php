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
      overflow-y: auto; /* Enables vertical scrolling */
      background-image: url('images/HomeBack.png');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      max-height: calc(100vh - 140px); /* Limits the height of the content */
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

    select, .checkbox-group, input[type="text"], input[type="url"], input[type="datetime-local"] {
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

    .reset-btn, .submit-btn {
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

    .reset-btn:hover, .submit-btn:hover {
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
      <img src="images/JAKE.jpg" alt="Profile Picture" class="profile-img"/>
      <span>Muhd Ilham bin Muhd Awang</span>
    </div>
  </div>

  <!-- Politeknik Logo -->
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

    <!-- Main Content -->
    <div class="main-content">
      <!-- Form Section -->
      <div class="form-section">
        <label for="course">Select Course:</label>
        <select id="course" name="course" onchange="updateModules()">
          <option value="midwifery">Midwifery</option>
          <option value="nursing">Nursing</option>
          <option value="cardiovascular-technology">Cardiovascular Technology</option>
          <option value="public-health">Public Health</option>
          <option value="paramedic">Paramedic</option>
          <option value="dental-hygiene">Dental Hygiene</option>
        </select>

        <label for="module">Select Module:</label>
        <select id="module" name="module">
          <!-- Dynamic module options will be injected here based on course -->
        </select>

        <label for="group-code">Select Group Code:</label>
        <select id="group-code" name="group-code">
          <option value="MIDW01">MIDW01</option>
          <option value="PMDC14">PMDC14</option>
          <option value="NRS02">NRS02</option>
          <option value="CTCH01">CTCH01</option>
          <option value="PHLTHY01">PHLTHY01</option>
          <option value="DHYG01">DHYG01</option>
        </select>

        <label for="student-id">Select Student ID:</label>
        <select id="student-id" name="student-id">
          <option value="MID1001">MID1001</option>
          <option value="MID1002">MID1002</option>
          <option value="PMD2001">PMD2001</option>
          <option value="PMD2002">PMD2002</option>
          <option value="PMD2003">PMD2003</option>
          <option value="NRS3004">NRS3004</option>
          <option value="NRS3005">NRS3005</option>
          <option value="CTC4003">CTC4003</option>
          <option value="PH5001">PH5001</option>
          <option value="PH5002">PH5002</option>
          <option value="DH6003">DH6003</option>
          <option value="DH6004">DH6004</option>
        </select>

        <label for="skill-name">Select Skill Name:</label>
        <div class="checkbox-group" id="skill-name">
          <label><input type="checkbox" name="skill-name" value="maternal-care"> Maternal Care</label>
          <label><input type="checkbox" name="skill-name" value="newborn-assessment"> Newborn Assessment</label>
          <label><input type="checkbox" name="skill-name" value="labor-monitoring"> Labor Monitoring</label>
          <label><input type="checkbox" name="skill-name" value="emergency-response"> Emergency Response</label>
          <label><input type="checkbox" name="skill-name" value="cpr"> CPR</label>
          <label><input type="checkbox" name="skill-name" value="trauma-care"> Trauma Care</label>
          <label><input type="checkbox" name="skill-name" value="vital-signs"> Vital Signs</label>
          <label><input type="checkbox" name="skill-name" value="wound-dressing"> Wound Dressing</label>
          <label><input type="checkbox" name="skill-name" value="iv-therapy"> IV Therapy</label>
          <label><input type="checkbox" name="skill-name" value="ecg-monitoring"> ECG Monitoring</label>
          <label><input type="checkbox" name="skill-name" value="heart-imaging"> Heart Imaging</label>
          <label><input type="checkbox" name="skill-name" value="oral-assessment"> Oral Assessment</label>
          <label><input type="checkbox" name="skill-name" value="scaling-polishing"> Scaling & Polishing</label>
          <label><input type="checkbox" name="skill-name" value="community-health"> Community Health</label>
          <label><input type="checkbox" name="skill-name" value="epidemiology"> Epidemiology</label>
          <label><input type="checkbox" name="skill-name" value="health-education"> Health Education</label>
        </div>

        <label for="set-date-time">Set Date & Time:</label>
        <input type="datetime-local" id="set-date-time" name="set-date-time">

        <button class="submit-btn">Confirm</button>
      </div>
    </div>
  </div>

  <script>
    function updateModules() {
      const course = document.getElementById("course").value;
      const moduleSelect = document.getElementById("module");

      // Clear existing modules
      moduleSelect.innerHTML = '';

      const modules = getModulesForCourse(course);
      modules.forEach(module => {
        const option = document.createElement('option');
        option.value = module;
        option.textContent = capitalizeFirstLetter(module.replace(/-/g, ' '));
        moduleSelect.appendChild(option);
      });
    }

    function getModulesForCourse(course) {
      switch(course) {
        case 'midwifery':
          return ['antenatal-care', 'delivery-assistance', 'postnatal-care'];
        case 'nursing':
          return ['patient-care', 'medication-administration', 'wound-care'];
        case 'cardiovascular-technology':
          return ['ecg-monitoring', 'echocardiography', 'vascular-ultrasound'];
        case 'public-health':
          return ['epidemiology', 'community-health', 'disease-prevention'];
        case 'paramedic':
          return ['first-aid', 'trauma-care', 'cardiac-arrest-management'];
        case 'dental-hygiene':
          return ['oral-health', 'dental-care', 'patient-education'];
        default:
          return [];
      }
    }

    function capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
  </script>
</body>
</html>
