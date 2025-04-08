<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students Performance Tracking</title>
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
      flex-wrap: wrap;
      gap: 20px;
    }

    .students-performance {
      background: white;
      outline: 1px black solid;
      padding: 20px;
      border-radius: 15px;
      width: 80%;
      margin-left: 20px;
      margin-top: 20px;
    }

    .students-performance h2 {
      font-size: 26px;
      font-weight: bold;
      margin-bottom: 25px;
      text-align: left;
    }

    .dropdown {
      position: relative;
      display: inline-block;
      width: 100%;
      margin-bottom: 15px;
    }

    .dropdown button {
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

    .dropdown button:hover {
      background-color: #2980b9;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100%;
    max-height: 500px; /* Limit the height */
    overflow-y: auto; /* Make it scrollable */
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    padding: 10px;
    border-radius: 5px;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .pass {
      background-color: #28a745;
      color: white;
      padding: 10px;
      border-radius: 5px;
      margin: 5px 0;
      display: inline-block;
    }

    .fail {
      background-color: #dc3545;
      color: white;
      padding: 10px;
      border-radius: 5px;
      margin: 5px 0;
      display: inline-block;
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

    /* Style for the search bar */
    .search-bar-container {
      position: absolute;
      top: 160px; /* Align it with the "Students Performance Tracking" */
      left: calc(70% + 20px); /* Move it to the left beside the main content */
      display: flex;
      justify-content: flex-start;
      padding: 20px 24px;
    }

    .search-bar {
      width: 400px; /* Increased width of the search bar */
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 2px solid #BDC3C7;
      transition: border-color 0.3s ease;
    }

    .search-bar:focus {
      border-color: #3498db;
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

  <!-- Search Bar Beside Main Content -->
  <div class="search-bar-container">
    <input type="text" id="searchBar" class="search-bar" placeholder="Search Student..." onkeyup="searchStudents()">
  </div>

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

    <div class="main-content">
      <div class="left-section">
        <div class="students-performance">
          <h2>Students Performance Tracking</h2>

          <div class="dropdown">
            <button onclick="toggleDropdown('students')">Student Name</button>
            <div id="students" class="dropdown-content">
              <a href="#">Ali Bin Ahmad - Module A1 - Group 101 - 78% <span class="pass">PASS</span></a>
              <a href="#">Siti Binti Omar - Module B2 - Group 102 - 42% <span class="fail">FAIL</span></a>
              <a href="#">John Doe - Module C3 - Group 103 - 82% <span class="pass">PASS</span></a>
              <a href="#">Amira Binti Salleh - Module D4 - Group 104 - 49% <span class="fail">FAIL</span></a>
              <a href="#">Farhan Bin Yusuf - Module E5 - Group 105 - 75% <span class="pass">PASS</span></a>
              <a href="#">Zara Binti Karim - Module F6 (2025-03-20) - Group 106 - 89% <span class="pass">PASS</span></a>
              <a href="#">Hafiz Bin Rahman - Module G7 (2025-03-22) - Group 107 - 39% <span class="fail">FAIL</span></a>
              <a href="#">Nurul Binti Zain - Module H8 (2025-03-24) - Group 108 - 57% <span class="pass">PASS</span></a>
              <a href="#">Daniel Bin Kamal - Module I9 (2025-03-26) - Group 109 - 45% <span class="fail">FAIL</span></a>
              <a href="#">Syafiq Bin Anwar - Module J10 (2025-03-28) - Group 110 - 66% <span class="pass">PASS</span></a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>
    function toggleDropdown(id) {
      var dropdown = document.getElementById(id);
      dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
    }

    function searchStudents() {
      var input = document.getElementById('searchBar');
      var filter = input.value.toUpperCase();
      var dropdown = document.getElementById('students');
      var items = dropdown.getElementsByTagName('a');
      
      for (var i = 0; i < items.length; i++) {
        var txtValue = items[i].textContent || items[i].innerText;
        items[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
      }
    }
  </script>

</body>
</html>
