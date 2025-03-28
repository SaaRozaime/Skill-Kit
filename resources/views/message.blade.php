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
      overflow: hidden;
      position: relative;
      opacity: 0;
      animation: fadeIn 1.5s ease-in-out forwards;
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

    /* Sidebar Buttons */
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

    /* Main Content Area */
    .main-content {
      flex-grow: 1;
      display: flex;
      padding: 30px;
      flex-wrap: wrap;
      justify-content: space-between;
      overflow: hidden;
      background-image: url('images/HomeBack.png');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      gap: 30px;
    }

    /* Left Section (Send Message Form) */
    .left-section {
      width: 70%;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      align-items: flex-start;
      justify-content: center;
    }

    .send-message-card {
      width: 100%;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 30px;
      border-radius: 15px;
      transition: transform 0.3s ease;
    }

    .send-message-card:hover {
      transform: translateY(-5px);
    }

    .send-message-card h2 {
      color: #333;
      margin-bottom: 25px;
      font-size: 24px;
      text-align: center;
    }

    .send-message-card input,
    .send-message-card textarea {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      font-size: 16px;
      border-radius: 8px;
      border: 2px solid #e0e0e0;
      transition: border-color 0.3s ease;
    }

    .send-message-card input:focus,
    .send-message-card textarea:focus {
      outline: none;
      border-color: #4CAF50;
    }

    .send-message-card textarea {
      height: 150px;
      resize: none;
    }

    /* Send Button Styling */
    .send-button {
      width: 100%;
      padding: 14px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: bold;
      margin-top: 20px;
    }

    .send-button:hover {
      background-color: #45a049;
      transform: translateY(-2px);
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Right Section (Notification and Calendar) */
    .right-section {
      width: 28%;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .notification-box {
      width: 100%;
      height: 60%;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 20px;
      border-radius: 15px;
      overflow-y: auto;
    }

    .notification-box h3 {
      color: #333;
      margin-bottom: 20px;
      font-size: 20px;
      text-align: center;
      padding-bottom: 10px;
      border-bottom: 2px solid #e0e0e0;
    }

    .notification-item {
      background: white;
      padding: 15px;
      margin-bottom: 15px;
      border-radius: 10px;
      border: 1px solid #e0e0e0;
    }

    .message-actions {
      display: flex;
      gap: 10px;
      margin-top: 10px;
    }

    .read-button, .delete-button {
      padding: 8px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .read-button {
      background-color: #4CAF50;
      color: white;
    }

    .read-button:hover {
      background-color: #45a049;
    }

    .delete-button {
      background-color: #f44336;
      color: white;
    }

    .delete-button:hover {
      background-color: #d32f2f;
    }

    /* Modal for reading full message */
    .message-modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }

    .message-modal-content {
      position: relative;
      background-color: white;
      margin: 15% auto;
      padding: 20px;
      width: 80%;
      max-width: 500px;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .close-modal {
      position: absolute;
      right: 20px;
      top: 10px;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
      color: #666;
    }

    .close-modal:hover {
      color: #333;
    }

    .full-message {
      margin-top: 20px;
      line-height: 1.6;
      color: #333;
    }

    /* Delete confirmation modal */
    .delete-modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }

    .delete-modal-content {
      position: relative;
      background-color: white;
      margin: 15% auto;
      padding: 20px;
      width: 80%;
      max-width: 400px;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .delete-confirm-buttons {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 20px;
    }

    .confirm-delete, .cancel-delete {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    .confirm-delete {
      background-color: #f44336;
      color: white;
    }

    .confirm-delete:hover {
      background-color: #d32f2f;
    }

    .cancel-delete {
      background-color: #9e9e9e;
      color: white;
    }

    .cancel-delete:hover {
      background-color: #757575;
    }

    .calendar-box {
      width: 100%;
      height: 40%;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 15px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: 400;
      color: #333;
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

    .error-message {
      color: #f44336;
      margin-bottom: 15px;
      display: none;
      padding: 10px;
      background-color: #ffebee;
      border-radius: 8px;
      border-left: 4px solid #f44336;
    }

    .success-message {
      color: #4CAF50;
      margin-bottom: 15px;
      display: none;
      padding: 10px;
      background-color: #e8f5e9;
      border-radius: 8px;
      border-left: 4px solid #4CAF50;
    }

    .no-messages {
      text-align: center;
      color: #666;
      padding: 20px;
      font-style: italic;
    }

    /* Profile Info in Message Form */
    .profile-info {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      padding: 15px;
      background: #f5f5f5;
      border-radius: 8px;
    }

    .profile-info img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin-right: 15px;
      border: 2px solid #4CAF50;
    }

    .profile-info p {
      margin: 0;
      color: #333;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <!-- Top Bar -->
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/FINN.png" alt="Profile Picture" class="profile-img"/>
      <span>{{ Auth::user()->name }}</span>
    </div>
  </div>

  <!-- Politeknik Logo (Top Right) -->
  <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo"/>

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
      <!-- Left Section (Send Message Form) -->
      <div class="left-section">
        <div class="send-message-card">
          <h2>Send Message</h2>
          <div id="errorMessage" class="error-message"></div>
          <div id="successMessage" class="success-message"></div>
          <form id="sendMessageForm">
            <div class="profile-info">
              <img src="images/FINN.png" alt="Profile Picture" class="profile-img"/>
              <p>Email: {{ Auth::user()->email }}</p>
            </div>
            <input type="email" name="to" id="to" placeholder="To (Email):" required />
            <textarea name="message" id="message" placeholder="Enter your message" required></textarea>
            <button type="submit" class="send-button">SEND</button>
          </form>
        </div>
      </div>

      <!-- Right Section (Notification and Calendar) -->
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
        <div class="calendar-box">Calendar</div>
      </div>
    </div>
  </div>

  <!-- Message Modal -->
  <div id="messageModal" class="message-modal">
    <div class="message-modal-content">
      <span class="close-modal" onclick="closeMessageModal()">&times;</span>
      <h3>Message Details</h3>
      <div class="full-message" id="fullMessageContent"></div>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div id="deleteModal" class="delete-modal">
    <div class="delete-modal-content">
      <h3>Delete Message</h3>
      <p>Are you sure you want to delete this message?</p>
      <div class="delete-confirm-buttons">
        <button class="confirm-delete" onclick="deleteMessage()">Delete</button>
        <button class="cancel-delete" onclick="closeDeleteModal()">Cancel</button>
      </div>
    </div>
  </div>

  <script>
    let currentMessageId = null;

    function openMessageModal(messageId, content) {
      currentMessageId = messageId;
      document.getElementById('fullMessageContent').textContent = content;
      document.getElementById('messageModal').style.display = 'block';
      markAsRead(messageId);
    }

    function closeMessageModal() {
      document.getElementById('messageModal').style.display = 'none';
    }

    function confirmDelete(messageId) {
      currentMessageId = messageId;
      document.getElementById('deleteModal').style.display = 'block';
    }

    function closeDeleteModal() {
      document.getElementById('deleteModal').style.display = 'none';
    }

    function deleteMessage() {
      if (!currentMessageId) return;

      fetch(`/message/${currentMessageId}/delete`, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Accept': 'application/json'
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const messageElement = document.querySelector(`[data-message-id="${currentMessageId}"]`);
          messageElement.remove();
        }
      })
      .finally(() => {
        closeDeleteModal();
      });
    }

    // Close modals when clicking outside
    window.onclick = function(event) {
      const messageModal = document.getElementById('messageModal');
      const deleteModal = document.getElementById('deleteModal');
      
      if (event.target == messageModal) {
        closeMessageModal();
      }
      if (event.target == deleteModal) {
        closeDeleteModal();
      }
    }

    document.getElementById('sendMessageForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      
      fetch('{{ route("message.send") }}', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Accept': 'application/json'
        },
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          document.getElementById('successMessage').textContent = data.message;
          document.getElementById('successMessage').style.display = 'block';
          this.reset();
          setTimeout(() => {
            location.reload();
          }, 1500);
        } else {
          document.getElementById('errorMessage').textContent = data.message;
          document.getElementById('errorMessage').style.display = 'block';
        }
      })
      .catch(error => {
        console.error('Error:', error);
        document.getElementById('errorMessage').textContent = 'An error occurred while sending the message.';
        document.getElementById('errorMessage').style.display = 'block';
      });
    });

    function markAsRead(messageId) {
      fetch(`/message/${messageId}/read`, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          'Accept': 'application/json'
        }
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const messageElement = document.querySelector(`[data-message-id="${messageId}"]`);
          messageElement.classList.remove('unread');
        }
      });
    }

    // Check for new messages every 30 seconds
    setInterval(() => {
      fetch('/message/unread-count')
        .then(response => response.json())
        .then(data => {
          if (data.count > 0) {
            location.reload();
          }
        });
    }, 30000);
  </script>
</body>
</html>
