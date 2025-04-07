<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Profile - SkillKit Dashboard</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Inter', sans-serif;
      overflow: hidden;
      position: relative;
      opacity: 0;
      animation: fadeIn 1.5s ease-in-out forwards;
      background-color: #f8f9fa;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .top-bar {
      width: 100%;
      height: 140px;
      background-color: #ffffff;
      color: #2d3436;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 24px;
      position: relative;
      border-bottom: 1px solid #e0e0e0;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .top-bar-left {
      display: flex;
      align-items: center;
    }

    .profile-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-right: 16px;
      border: 3px solid #4CAF50;
      padding: 2px;
    }

    .top-bar-left span {
      font-size: 20px;
      font-weight: 600;
      color: #2d3436;
    }

    .politeknik-logo {
      position: absolute;
      top: -8px;
      right: 48px;
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
      background-color: #ffffff;
      color: #2d3436;
      padding: 24px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
      border-right: 1px solid #e0e0e0;
      box-shadow: 2px 0 4px rgba(0, 0, 0, 0.05);
    }

    .sidebar button {
      background: transparent;
      border: none;
      color: #2d3436;
      font-size: 16px;
      padding: 12px 20px;
      text-align: left;
      width: 100%;
      margin-bottom: 8px;
      cursor: pointer;
      border-radius: 8px;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .sidebar button:hover {
      background-color: #f8f9fa;
      color: #4CAF50;
    }

    .main-content {
      flex-grow: 1;
      display: flex;
      padding: 24px;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      background-color: #f8f9fa;
    }

    .profile-card {
      width: 100%;
      max-width: 600px;
      background: #ffffff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      border-radius: 16px;
      padding: 32px;
      border: none;
    }

    .profile-header {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 32px;
    }

    .profile-picture {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin-bottom: 20px;
      border: 3px solid #4CAF50;
      padding: 2px;
    }

    .profile-header h2 {
      margin: 0;
      font-size: 24px;
      color: #2d3436;
      font-weight: 700;
    }

    .profile-info {
      margin-bottom: 32px;
    }

    .info-group {
      display: flex;
      margin-bottom: 16px;
      padding: 16px;
      background: #f8f9fa;
      border-radius: 12px;
      border: 1px solid #e0e0e0;
      transition: all 0.3s ease;
    }

    .info-group:hover {
      background: #f1f3f5;
    }

    .info-group label {
      width: 120px;
      font-weight: 600;
      color: #2d3436;
    }

    .info-group span {
      flex: 1;
      color: #636e72;
    }

    .profile-actions {
      display: flex;
      gap: 16px;
      justify-content: center;
    }

    .edit-button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .edit-button:hover {
      background-color: #45a049;
      transform: translateY(-2px);
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
      background-color: #ffffff;
      margin: 15% auto;
      padding: 32px;
      width: 80%;
      max-width: 500px;
      border-radius: 16px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .close {
      position: absolute;
      right: 24px;
      top: 16px;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
      color: #2d3436;
    }

    .edit-form {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .form-group label {
      font-weight: 600;
      color: #2d3436;
    }

    .form-group input {
      padding: 12px;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      font-size: 16px;
      background-color: #f8f9fa;
    }

    .save-button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 16px;
    }

    .save-button:hover {
      background-color: #45a049;
      transform: translateY(-2px);
    }

    .success-message, .error-message {
      position: fixed;
      top: 24px;
      right: 24px;
      padding: 16px 24px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      z-index: 1000;
      display: none;
      animation: slideIn 0.5s ease-out;
    }

    .success-message {
      background-color: #4CAF50;
      color: white;
    }

    .error-message {
      background-color: #ff6b6b;
      color: white;
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
