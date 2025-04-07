<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report & Feedback - SkillKit Dashboard</title>
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

    .send-message-card {
      background: #ffffff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      padding: 32px;
      border-radius: 16px;
      border: none;
    }

    .send-message-card h2 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 20px;
      color: #2d3436;
      text-align: left;
      padding-bottom: 16px;
      border-bottom: 2px solid #f1f3f5;
    }

    .send-message-card input,
    .send-message-card textarea {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      font-size: 15px;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      background-color: #f8f9fa;
    }

    .send-message-card textarea {
      height: 150px;
      resize: none;
    }

    .rating-container {
      display: flex;
      gap: 8px;
      margin: 16px 0;
      flex-wrap: wrap;
    }

    .rating-button {
      padding: 8px 16px;
      font-size: 15px;
      background-color: #f8f9fa;
      border: 1px solid #e0e0e0;
      color: #2d3436;
      cursor: pointer;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .rating-button:hover {
      background-color: #e9ecef;
    }

    .rating-button.active {
      background-color: #4CAF50;
      color: white;
      border-color: #4CAF50;
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
  </style>
</head>
<body>
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
      <!-- Left Section (Report and Feedback Form) -->
      <div class="left-section">
        <div class="send-message-card">
          <h2>Report and Feedback</h2>
          <form id="feedbackForm">
            <!-- Rating System -->
            <label for="rating">Rate the website (1-10):</label>
            <div id="rating-container" class="rating-container">
              <button class="rating-button" type="button" data-value="1">1</button>
              <button class="rating-button" type="button" data-value="2">2</button>
              <button class="rating-button" type="button" data-value="3">3</button>
              <button class="rating-button" type="button" data-value="4">4</button>
              <button class="rating-button" type="button" data-value="5">5</button>
              <button class="rating-button" type="button" data-value="6">6</button>
              <button class="rating-button" type="button" data-value="7">7</button>
              <button class="rating-button" type="button" data-value="8">8</button>
              <button class="rating-button" type="button" data-value="9">9</button>
              <button class="rating-button" type="button" data-value="10">10</button>
            </div>
            
            <!-- Suggestions Field -->
            <textarea name="suggestions" id="suggestions" placeholder="Enter your suggestions" required></textarea>
            
            <button type="button" class="send-button" onclick="submitFeedback()">Submit Feedback</button>
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
    // Get all the rating buttons
    const ratingButtons = document.querySelectorAll('.rating-button');

    ratingButtons.forEach(button => {
      button.addEventListener('click', function () {
        // Remove 'active' class from all buttons
        ratingButtons.forEach(b => b.classList.remove('active'));
        
        // Add 'active' class to the clicked button
        button.classList.add('active');
        
        // Set the rating value
        document.getElementById('rating').value = button.getAttribute('data-value');
      });
    });

    function submitFeedback() {
      var rating = document.querySelector('.rating-button.active');
      var suggestions = document.getElementById('suggestions').value;

      if (!rating || suggestions === "") {
        alert("Please fill out all the fields.");
        return false;
      }

      // If validation passes, show thank you message
      alert("Thank you for your feedback! Rating: " + rating.getAttribute('data-value') + "/10\nSuggestions: " + suggestions);

      // Clear the active class from all the rating buttons to reset the selection
      ratingButtons.forEach(button => button.classList.remove('active'));

      // Optional: You can clear the form or do something else here
      document.getElementById('feedbackForm').reset();  // This will reset the form fields
    }
  </script>
</body>
</html>
