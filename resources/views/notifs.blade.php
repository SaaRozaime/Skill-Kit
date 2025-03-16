<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Announcements & Notifications</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Lexend, sans-serif;
      overflow-x: hidden;
      overflow-y: hidden;
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

    .container {
      display: flex;
      height: calc(100vh - 140px);
      background-color: transparent;
      overflow: hidden;
    }

    .sidebar {
      width: 250px;
      background-color: #F0F0F0;
      color: black;
      padding: 20px;
      display: flex;
      flex-direction: column;
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
      flex-direction: column;
      padding: 20px;
      background-image: url('images/HomeBack.png');
      background-size: cover;
      background-position: center;
      height: 100%;
      overflow: hidden;
    }

    .announcement-box {
      background: rgba(217, 217, 217, 0.8);
      padding: 20px;
      border-radius: 5px;
      width: 100%;
      box-sizing: border-box;
    }

    .input-box-group {
      margin-bottom: 15px;
    }

    .input-box-group label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    .input-box-group input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 2px solid #BDC3C7;
      font-size: 16px;
    }

    .checkbox-group {
      display: flex;
      gap: 10px;
      align-items: center;
    }

    .checkbox-group input {
      margin-right: 5px;
    }

    .submit-btn {
      background-color: green;
      color: white;
      font-size: 18px;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
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

  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <a href="{{ route('homeadmin') }}"><button>Homepage</button></a>
      <a href="{{ route('profileadmin') }}"><button>Profile</button></a>
      <a href="{{ route('messageadmin') }}"><button>Message</button></a>
      <a href="{{ route('accountadmin') }}"><button>Account</button></a>
      <a href="{{ route('reportfeedbackadmin') }}"><button>Report & Feedbacks</button></a>
      <a href="{{ route('aboutusadmin') }}"><button>About us</button></a>
      <a href="{{ route('login') }}"><button>Log Out</button></a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="announcement-box">
        <h2>Create Announcement</h2>
        <div class="input-box-group">
          <label for="announcement">Announcement Message</label>
          <input type="text" id="announcement" name="announcement" placeholder="Enter your message here...">
        </div>
        
        <div class="checkbox-group">
          <label>Targeted Audience:</label>
          <label><input type="checkbox" name="audience" value="Lecturers"> Lecturers</label>
          <label><input type="checkbox" name="audience" value="Students"> Students</label>
        </div>

        <button class="submit-btn" onclick="submitAnnouncement()">Submit</button>
      </div>
    </div>
  </div>

  <script>
    function submitAnnouncement() {
      const message = document.getElementById('announcement').value;
      const audience = Array.from(document.querySelectorAll('input[name="audience"]:checked'))
                            .map(cb => cb.value);
      
      if (!message) {
        alert('Please enter an announcement message.');
        return;
      }
      
      if (audience.length === 0) {
        alert('Please select at least one targeted audience.');
        return;
      }
      
      alert(`Announcement Sent: ${message}\nTarget Audience: ${audience.join(', ')}`);
    }
  </script>
</body>
</html>
