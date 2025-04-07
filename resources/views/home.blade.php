<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Home - SkillKit Dashboard</title>
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
      from { opacity: 0; }
      to { opacity: 1; }
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
      flex-wrap: wrap;
      gap: 20px;
    }

    .box-link {
      display: block;
      width: 48%;
      height: 243.54px;
    }

    .box-button {
      width: 100%;
      height: 100%;
      background: #ffffff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      font-size: 20px;
      font-weight: 500;
      color: #2d3436;
      cursor: pointer;
      border-radius: 16px;
      border: none;
      transition: all 0.3s ease;
      padding: 24px;
      text-align: left;
    }

    .box-button:hover {
      background-color: #f8f9fa;
      transform: translateY(-4px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .box-button:active {
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
    <x-sidebar />

    <!-- Main Content -->
    <div class="main-content">
      <!-- Left Section -->
      <div class="left-section">
        <a href="{{ route('practicemode') }}" class="box-link">
          <button class="box-button">Practice Mode</button>
        </a>
        <a href="{{ route('schedule') }}" class="box-link"> 
          <button class="box-button">Assessment Schedule</button>
        </a>
        <a href="{{ route('guides') }}" class="box-link">
          <button class="box-button">Guides & Resources</button>
        </a>
        <a href="{{ route('searchlibrary') }}" class="box-link"> 
          <button class="box-button">Search Library</button>
        </a>
        <a href="{{ route('assessmenthistory') }}" class="box-link"> 
          <button class="box-button">Assessment History</button>
        </a>
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
    // Add CSRF token to all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
