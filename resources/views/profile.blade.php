<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SkillKit Dashboard</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Lexend, sans-serif;
      overflow: hidden; /* Prevent scrolling */
      position: relative; /* Allow absolute positioning within the page */
      opacity: 0; /* Set initial opacity to 0 */
      animation: fadeIn 1.5s ease-in-out forwards; /* Fade-in animation */
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

    /* Politeknik Logo */
    .politeknik-logo {
      width: 150px;
      height: auto;
      object-fit: contain;
      margin-right: 20px;
    }

    .container {
      display: flex;
      height: calc(100vh - 140px); /* Adjust container height to account for the bigger top bar */
      background-color: transparent; /* Make the container background transparent to let the image show through */
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #F0F0F0; /* Off-white color */
      color: black; /* Darker text for contrast */
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between; /* Ensures content is spread out */
      height: 100%;
      border-right: 3px solid black; /* Line divider between sidebar and content (black) */
      position: relative; /* Required for absolute positioning of SkillKit logo */
    }

    /* Sidebar Buttons */
    .sidebar button {
      background: transparent;
      border: 2px solid #BDC3C7; /* Light gray border */
      color: black; /* Darker text for contrast */
      font-size: 18px;
      padding: 15px;
      text-align: left;
      width: 100%;
      margin-bottom: 10px;
      cursor: pointer;
      border-radius: 5px; /* Add rounded corners to the button */
      transition: all 0.3s ease; /* Smooth transition for hover effects */
    }

    /* Change the hover color to gray */
    .sidebar button:hover {
      background-color: #D3D3D3; /* Gray background on hover */
      border-color: #A9A9A9; /* Slightly darker gray for border */
      color: #333; /* Darker text color */
    }

    /* Main Content */
    .main-content {
      flex-grow: 1;
      display: flex;
      padding: 20px;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      background-image: url('images/HomeBack.png');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    /* Profile Card */
    .profile-card {
      width: 100%;
      max-width: 600px;
      background: rgba(217, 217, 217, 0.9);
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border: 2px solid #bbb;
    }

    .profile-header {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 30px;
    }

    .profile-picture {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin-bottom: 20px;
      border: 3px solid #bbb;
    }

    .profile-header h2 {
      margin: 0;
      font-size: 24px;
      color: #333;
    }

    .profile-info {
      margin-bottom: 30px;
    }

    .info-group {
      display: flex;
      margin-bottom: 15px;
      padding: 10px;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 8px;
    }

    .info-group label {
      width: 120px;
      font-weight: bold;
      color: #555;
    }

    .info-group span {
      flex: 1;
      color: #333;
    }

    .profile-actions {
      display: flex;
      gap: 15px;
      justify-content: center;
    }

    .edit-button {
      background-color: #4CAF50;
      color: white;
    }

    .edit-button:hover {
      background-color: #45a049;
    }

    /* Right Section (Notification and Calendar) */
    .right-section {
      width: 28%; /* Take the remaining space */
      display: flex;
      flex-direction: column;
      gap: 20px;
      border-left: 3px solid black; /* Divider between Notification and Calendar */
      padding-left: 20px; /* Add padding to the left side to align content properly */
    }

    /* Smaller Notification Box */
    .notification-box {
      width: 100%;
      height: 60%; /* Make Notification bigger */
      background: rgba(217, 217, 217, 0.8); /* Slight transparency */
      outline: 1px black solid;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: black;
    }

    /* Smaller Calendar Box */
    .calendar-box {
      width: 100%;
      height: 40%; /* Make Calendar smaller */
      background: rgba(217, 217, 217, 0.8); /* Slight transparency */
      outline: 1px black solid;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: black;
    }

    /* SkillKit Logo Positioned Inside the Clear Space Under the Log Out Button */
    .bottom-logo {
      margin-top: 10px; /* Reduced margin-top to move the logo higher */
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0; /* Add some padding above the logo */
    }

    .bottom-logo img {
      width: 200px; /* Increased width for a bigger logo */
      height: auto; /* Maintain aspect ratio */
    }

    /* Edit Profile Modal */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }

    .modal-content {
      position: relative;
      background-color: #fff;
      margin: 15% auto;
      padding: 20px;
      width: 80%;
      max-width: 500px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .close {
      position: absolute;
      right: 20px;
      top: 10px;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .edit-form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 5px;
    }

    .form-group label {
      font-weight: bold;
      color: #333;
    }

    .form-group input {
      padding: 8px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
    }

    .save-button {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
    }

    .save-button:hover {
      background-color: #45a049;
    }

    /* Success Message */
    .success-message {
      position: fixed;
      top: 20px;
      right: 20px;
      background-color: #4CAF50;
      color: white;
      padding: 15px 25px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      z-index: 1000;
      display: none;
      animation: slideIn 0.5s ease-out;
    }

    @keyframes slideIn {
      from {
        transform: translateX(100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    /* Error Message */
    .error-message {
      position: fixed;
      top: 20px;
      right: 20px;
      background-color: #f44336;
      color: white;
      padding: 15px 25px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      z-index: 1000;
      display: none;
      animation: slideIn 0.5s ease-out;
    }
  </style>
</head>
<body>
  <!-- Success Message -->
  @if(session('success'))
    <div class="success-message" id="successMessage">
      {{ session('success') }}
    </div>
  @endif

  <!-- Error Message -->
  @if(session('error'))
    <div class="error-message" id="errorMessage">
      {{ session('error') }}
    </div>
  @endif

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/FINN.png" alt="Profile" class="profile-img">
      <span class="user-name">{{ $user->name }}</span>
    </div>
    <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo">
  </div>

  <div class="container">
    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="main-content">
      <div class="profile-card">
        <div class="profile-header">
          <img src="images/FINN.png" alt="Profile Picture" class="profile-picture">
          <h2>{{ $user->name }}</h2>
        </div>
        <div class="profile-info">
          <div class="info-group">
            <label>Name:</label>
            <span>{{ $user->name }}</span>
          </div>
          <div class="info-group">
            <label>Email:</label>
            <span>{{ $user->email }}</span>
          </div>
          <div class="info-group">
            <label>Role:</label>
            <span>{{ ucfirst($user->role) }}</span>
          </div>
          <div class="info-group">
            <label>Member Since:</label>
            <span>{{ $user->created_at->format('F j, Y') }}</span>
          </div>
        </div>
        <div class="profile-actions">
          <button class="edit-button" onclick="openEditModal()">Edit Profile</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Profile Modal -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeEditModal()">&times;</span>
      <h2>Edit Profile</h2>
      <form class="edit-form" method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <button type="submit" class="save-button">Save Changes</button>
      </form>
    </div>
  </div>

  <script>
    function openEditModal() {
      document.getElementById('editModal').style.display = 'block';
    }

    function closeEditModal() {
      document.getElementById('editModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
      var editModal = document.getElementById('editModal');
      if (event.target == editModal) {
        editModal.style.display = 'none';
      }
    }

    // Add CSRF token to all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Show success message if it exists
    @if(session('success'))
      document.getElementById('successMessage').style.display = 'block';
      setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
      }, 3000);
    @endif

    // Show error message if it exists
    @if(session('error'))
      document.getElementById('errorMessage').style.display = 'block';
      setTimeout(function() {
        document.getElementById('errorMessage').style.display = 'none';
      }, 3000);
    @endif
  </script>
</body>
</html>
