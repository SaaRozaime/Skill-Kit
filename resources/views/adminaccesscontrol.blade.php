<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SkillKit Access Control</title>
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
      overflow-y: auto;
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
      max-height: 500px;
      overflow-y: auto;
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

    /* Access Control Form */
    .access-control {
      width: 100%;
      background: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 5px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .access-control input, .access-control select {
      font-size: 16px;
      padding: 10px;
      margin-top: 5px;
    }

    .checkbox-group input {
      margin-right: 10px;
    }

    .access-control button {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 12px 20px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 5px;
      width: 200px;
      margin-top: 20px;
    }

    .access-control button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <!-- Top Bar -->
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/LICH.jpg" alt="Profile Picture" class="profile-img"/>
      <span>Nurul Fatin Rozaime</span>
    </div>
  </div>

  <!-- Politeknik Logo (Top Right) -->
  <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo"/>

  <div class="container">
    <!-- Sidebar -->
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

    <!-- Main Content -->
    <div class="main-content">
      <!-- Access Control Form -->
      <div class="access-control">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Name" required>

        <label for="course">Course:</label>
        <input type="text" id="course" name="course" placeholder="Enter Course" required>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" placeholder="Enter Department" required>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" placeholder="Enter Role" required>

        <label for="group-code">Group Code:</label>
        <input type="text" id="group-code" name="group-code" placeholder="Enter Group Code" required>

        <div>
          <label for="selected-area">Selected Area Access:</label>
          <div class="checkbox-group">
            <input type="checkbox" id="adding-skill" name="selected-area" value="adding-skill">
            <label for="adding-skill">Adding Skill</label>

            <input type="checkbox" id="assessment-history" name="selected-area" value="assessment-history">
            <label for="assessment-history">Assessment History</label>

            <input type="checkbox" id="assessment-schedule" name="selected-area" value="assessment-schedule">
            <label for="assessment-schedule">Assessment Schedule</label>

            <input type="checkbox" id="create-skill-assessment" name="selected-area" value="create-skill-assessment">
            <label for="create-skill-assessment">Create Skill Assessment</label>

            <input type="checkbox" id="guides-resources" name="selected-area" value="guides-resources">
            <label for="guides-resources">Guides & Resources</label>

            <input type="checkbox" id="practice-mode" name="selected-area" value="practice-mode">
            <label for="practice-mode">Practice Mode</label>

            <input type="checkbox" id="search-library" name="selected-area" value="search-library">
            <label for="search-library">Search Library</label>

            <input type="checkbox" id="student-performance" name="selected-area" value="student-performance">
            <label for="student-performance">Student Performance</label>

            <input type="checkbox" id="write-assessment" name="selected-area" value="write-assessment">
            <label for="write-assessment">Write Assessment</label>

          </div>
        </div>

        <button type="submit">Submit</button>
      </div>
    </div>
  </div>

  <script>
    // Event listener for form submission
    document.querySelector('.access-control button').addEventListener('click', function(event) {
      event.preventDefault();
      const formFields = document.querySelectorAll('.access-control input, .access-control select');
      let formValid = true;
      let errorMessage = '';

      // Check for empty fields
      formFields.forEach(field => {
        if (field.type !== 'checkbox' && field.value.trim() === '') {
          errorMessage = 'All fields are required.';
          formValid = false;
        }
      });

      // Check if at least one checkbox is checked
      const checkboxes = document.querySelectorAll('.access-control input[type="checkbox"]');
      const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
      if (!isChecked) {
        errorMessage = 'Please select at least one access area.';
        formValid = false;
      }

      // If form is valid, proceed
      if (formValid) {
        alert('Form submitted successfully.');
        
        // Reset input fields and checkboxes
        formFields.forEach(field => {
          if (field.type !== 'checkbox') {
            field.value = '';  // Reset text input and select fields
          }
        });

        checkboxes.forEach(checkbox => {
          checkbox.checked = false;  // Uncheck all checkboxes
        });
      } else {
        alert(errorMessage); // Show only the relevant error message
      }
    });
  </script>
</body>
</html>
