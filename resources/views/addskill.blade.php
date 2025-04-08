<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adding Skill</title>
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

    select, .checkbox-group, input[type="text"], input[type="url"] {
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

        <label for="skill-name">Enter Skill Name:</label>
        <input type="text" id="skill-name" name="skill-name" required>

        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" required>

        <label for="tutorial-link-1">Enter Tutorial Link (Optional):</label>
        <input type="url" id="tutorial-link-1" name="tutorial-link-1">

        <label for="tutorial-link-2">Enter Another Tutorial Link (Optional):</label>
        <input type="url" id="tutorial-link-2" name="tutorial-link-2">

        <button class="submit-btn">Submit</button>
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

    // Initialize modules on page load
    window.onload = updateModules;
  </script>
</body>
</html>
