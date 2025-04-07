<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    .message-card p {
      font-size: 16px;
      color: #636e72;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .message-card ul {
      list-style-type: none;
      padding: 0;
      margin: 24px 0;
    }

    .message-card ul li {
      padding: 16px 20px;
      margin-bottom: 12px;
      background: #f8f9fa;
      border-radius: 12px;
      border-left: 4px solid #4CAF50;
      font-size: 15px;
      color: #2d3436;
      transition: all 0.3s ease;
    }

    .message-card ul li:hover {
      background: #f1f3f5;
      transform: translateX(4px);
    }

    .contact-info {
      display: flex;
      flex-direction: column;
      gap: 16px;
      margin-top: 32px;
      padding-top: 24px;
      border-top: 2px solid #f1f3f5;
    }

    .contact-info a {
      text-decoration: none;
      font-size: 15px;
      color: #2d3436;
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 16px 20px;
      background: #f8f9fa;
      border-radius: 12px;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .contact-info a:hover {
      background: #f1f3f5;
      color: #4CAF50;
      transform: translateX(8px);
    }

    .contact-info img {
      width: 24px;
      height: 24px;
      border-radius: 6px;
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
      border: none;
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
      <!-- Left Section (Message Card) -->
      <div class="left-section">
        <div class="message-card">
          <h2>About us</h2>
          <p>Welcome to SkillKit! We are dedicated to providing medical students with the tools they need to succeed in their studies. Our mission is to empower students by offering a range of features designed to help them stay on track and reach their academic goals.</p>
          <p>Here are some of the key features of our platform:</p>
          <ul>
            <li>Assessment Scheduling: Easily manage your upcoming assessments.</li>
            <li>Practice Mode: Test your knowledge with interactive practice questions.</li>
            <li>Guides & Resources: Access study materials and guides to enhance your learning.</li>
            <li>Reports & Feedback: Receive feedback on your performance to help you improve.</li>
          </ul>
          <p>We are committed to helping you navigate through your academic journey and achieve excellence in your field.</p>
          
          <div class="contact-info">
            <a href="https://www.instagram.com/skillkit.bn" target="_blank">
              <img src="images/Instagram.png" alt="Instagram Icon"/> <i class="fab fa-instagram"></i> skillkit.bn
            </a>
            <a href="tel:+6738268291">
              <img src="images/phone.png" alt="Phone Icon"/> <i class="fas fa-phone"></i> +673 826 8291
            </a>
            <a href="mailto:skillkit.bn@gmail.com">
              <img src="images/mail.png" alt="Email Icon"/> <i class="fas fa-envelope"></i> skillkit.bn@gmail.com
            </a>
          </div>
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

  <!-- Font Awesome CDN (For Icons) -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
