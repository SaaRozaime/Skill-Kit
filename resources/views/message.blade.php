<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Message - SkillKit Dashboard</title>
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
      justify-content: space-between;
      overflow: hidden;
      background-color: #f8f9fa;
    }

    .left-section {
      width: 70%;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .message-card {
      background: #ffffff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      padding: 32px;
      border-radius: 16px;
      border: none;
    }

    .message-card h2 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 20px;
      color: #2d3436;
      text-align: left;
      padding-bottom: 16px;
      border-bottom: 2px solid #f1f3f5;
    }

    .message-form {
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

    .form-group select,
    .form-group textarea {
      padding: 12px;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      font-size: 16px;
      background-color: #f8f9fa;
    }

    .form-group textarea {
      height: 150px;
      resize: none;
    }

    .send-button {
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

    .send-button:hover {
      background-color: #45a049;
      transform: translateY(-2px);
    }

    .right-section {
      width: 25%;
      display: flex;
      flex-direction: column;
      gap: 20px;
      border-left: 1px solid #e0e0e0;
      padding-left: 24px;
      padding-right: 16px;
      margin-right: 16px;
    }

    .notification-box {
      width: 100%;
      height: 100%;
      background: #ffffff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      padding: 24px;
      border-radius: 16px;
      overflow-y: auto;
      border: none;
    }

    .notification-box h3 {
      color: #2d3436;
      margin-bottom: 20px;
      font-size: 20px;
      text-align: left;
      padding-bottom: 16px;
      border-bottom: 2px solid #f1f3f5;
      font-weight: 700;
    }

    .notification-item {
      background: #f8f9fa;
      padding: 16px;
      margin-bottom: 16px;
      border-radius: 12px;
      border: 1px solid #e0e0e0;
      transition: all 0.3s ease;
    }

    .notification-item:hover {
      background: #f1f3f5;
    }

    .message-actions {
      display: flex;
      gap: 12px;
      margin-top: 12px;
    }

    .read-button, .delete-button {
      padding: 8px 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    .read-button {
      background-color: #4CAF50;
      color: white;
    }

    .read-button:hover {
      background-color: #45a049;
      transform: translateY(-2px);
    }

    .delete-button {
      background-color: #ff6b6b;
      color: white;
    }

    .delete-button:hover {
      background-color: #ff5252;
      transform: translateY(-2px);
    }

    .no-messages {
      text-align: center;
      color: #636e72;
      padding: 32px;
      font-style: italic;
      font-size: 15px;
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

    .recipient-input-group {
      display: flex;
      flex-direction: column;
      gap: 16px;
      margin-bottom: 8px;
    }

    .recipient-option {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .recipient-option label {
      font-weight: 500;
      color: #2d3436;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .recipient-option input[type="radio"] {
      margin: 0;
    }

    .recipient-input,
    .recipient-select {
      width: 100%;
      padding: 12px;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      font-size: 16px;
      background-color: #f8f9fa;
    }

    .recipient-input:disabled,
    .recipient-select:disabled {
      background-color: #f1f3f5;
      cursor: not-allowed;
      opacity: 0.7;
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

    <!-- Main Content Area -->
    <div class="main-content">
      <!-- Left Section (Message Form) -->
      <div class="left-section">
        <div class="message-card">
          <h2>Send Message</h2>
          <form class="message-form" method="POST" action="{{ route('message.send') }}">
            @csrf
            <div class="form-group">
              <label for="recipient">To:</label>
              <div class="recipient-input-group">
                <div class="recipient-option">
                  <input type="radio" name="recipient_type" value="email" id="email_type" checked>
                  <label for="email_type">Email Address</label>
                  <input type="text" 
                         name="recipient" 
                         id="recipient" 
                         placeholder="Enter email address"
                         class="recipient-input"
                         autocomplete="off">
                </div>
                <div class="recipient-option">
                  <input type="radio" name="recipient_type" value="select" id="select_type">
                  <label for="select_type">Select User</label>
                  <select name="recipient" id="recipient-select" class="recipient-select" disabled>
                    <option value="">Select from registered users</option>
                    @foreach($users as $recipient)
                      <option value="{{ $recipient->id }}">{{ $recipient->name }} ({{ $recipient->email }})</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="message">Message:</label>
              <textarea name="content" id="message" required></textarea>
            </div>
            <button type="submit" class="send-button">Send Message</button>
          </form>
        </div>
      </div>

      <!-- Right Section -->
      <div class="right-section">
        <div class="notification-box">
          <h3>Received Messages</h3>
          @if($messages->count() > 0)
            @foreach($messages as $message)
              <div class="notification-item {{ !$message->is_read ? 'unread' : '' }}" 
                   data-message-id="{{ $message->id }}">
                <div class="message-sender">
                  From: {{ $message->sender->name }}
                </div>
                <div class="message-content">
                  {{ Str::limit($message->content, 100) }}
                </div>
                <div class="message-time">
                  {{ $message->created_at->format('M d, Y H:i') }}
                </div>
                <div class="message-actions">
                  <button class="read-button" onclick="openMessageModal({{ $message->id }}, '{{ $message->content }}')">Read</button>
                  <button class="delete-button" onclick="confirmDelete({{ $message->id }})">Delete</button>
                </div>
              </div>
            @endforeach
          @else
            <div class="no-messages">
              No messages received yet.
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <script>
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

    // Add CSRF token to all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function openMessageModal(messageId, content) {
      // Implement message modal functionality
      alert(content); // For now, just show an alert
    }

    function confirmDelete(messageId) {
      if (confirm('Are you sure you want to delete this message?')) {
        // Implement delete functionality
        fetch(`/message/${messageId}/delete`, {
          method: 'DELETE',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            const messageElement = document.querySelector(`[data-message-id="${messageId}"]`);
            messageElement.remove();
          }
        });
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      const emailType = document.getElementById('email_type');
      const selectType = document.getElementById('select_type');
      const emailInput = document.getElementById('recipient');
      const selectInput = document.getElementById('recipient-select');

      function toggleInputs() {
        if (emailType.checked) {
          emailInput.disabled = false;
          selectInput.disabled = true;
          selectInput.value = '';
        } else {
          emailInput.disabled = true;
          selectInput.disabled = false;
          emailInput.value = '';
        }
      }

      emailType.addEventListener('change', toggleInputs);
      selectType.addEventListener('change', toggleInputs);

      // Initial state
      toggleInputs();
    });
  </script>
</body>
</html>
