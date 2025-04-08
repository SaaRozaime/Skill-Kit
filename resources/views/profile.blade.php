@extends('layouts.master')

@section('title', 'Profile')

@section('additional-styles')
.left-section {
    width: 70%;
    display: flex;
    flex-direction: column;
    gap: 20px;
    background-color: #f8f9fa;
    padding: 24px;
    border-radius: 16px;
}

.profile-card {
    width: 100%;
    max-width: 800px;
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    padding: 32px;
    border-radius: 16px;
    border: none;
    margin: 0 auto;
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

.edit-button, .change-password-button {
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

.edit-button:hover, .change-password-button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
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

.edit-form, .password-form {
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

.form-group input.error {
    border-color: #ff6b6b;
}

.error-message {
    color: #ff6b6b;
    font-size: 14px;
    margin-top: 4px;
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

.right-section {
    width: 25%;
    display: flex;
    flex-direction: column;
    gap: 20px;
    border-left: 1px solid #e0e0e0;
    padding-left: 24px;
    padding-right: 16px;
    margin-right: 16px;
    background-color: #f8f9fa;
    padding: 24px;
    border-radius: 16px;
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

.message-sender {
    font-weight: 600;
    color: #2d3436;
    margin-bottom: 8px;
}

.message-content {
    color: #636e72;
    margin-bottom: 8px;
}

.message-time {
    font-size: 12px;
    color: #95a5a6;
    margin-bottom: 12px;
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
@endsection

@section('content')
<div class="main-content" style="background-color: #f8f9fa; padding: 24px;">
    <!-- Left Section -->
    <div class="left-section">
        <div class="profile-card">
            <div class="profile-header">
                <img src="{{ asset('images/FINN.png') }}" alt="Profile Picture" class="profile-picture">
                <h2>{{ Auth::user()->name }}</h2>
            </div>
            <div class="profile-info">
                <div class="info-group">
                    <label>Name:</label>
                    <span>{{ Auth::user()->name }}</span>
                </div>
                <div class="info-group">
                    <label>Email:</label>
                    <span>{{ Auth::user()->email }}</span>
                </div>
                <div class="info-group">
                    <label>Role:</label>
                    <span>{{ ucfirst(Auth::user()->role) }}</span>
                </div>
                @if(Auth::user()->role === 'student')
                <div class="info-group">
                    <label>Course:</label>
                    <span>{{ Auth::user()->course }}</span>
                </div>
                @endif
                <div class="info-group">
                    <label>Member Since:</label>
                    <span>{{ Auth::user()->created_at->format('F j, Y') }}</span>
                </div>
            </div>
            <div class="profile-actions">
                <button class="edit-button" onclick="openEditModal()">Edit Profile</button>
                <button class="change-password-button" onclick="openPasswordModal()">Change Password</button>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <div class="notification-box">
            <h3>Received Messages</h3>
            @if(isset($messages) && $messages->count() > 0)
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
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>
            <button type="submit" class="save-button">Save Changes</button>
        </form>
    </div>
</div>

<!-- Change Password Modal -->
<div id="passwordModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closePasswordModal()">&times;</span>
        <h2>Change Password</h2>
        @if($errors->any())
            <div class="error-message" style="margin-bottom: 20px;">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        <form class="password-form" method="POST" action="{{ route('profile.password') }}" id="passwordForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="current_password">Current Password:</label>
                <input type="password" id="current_password" name="current_password" required>
                @error('current_password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
                @error('new_password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password:</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
                @error('new_password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="save-button">Change Password</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function openEditModal() {
        document.getElementById('editModal').style.display = 'block';
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    function openPasswordModal() {
        document.getElementById('passwordModal').style.display = 'block';
    }

    function closePasswordModal() {
        document.getElementById('passwordModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        var editModal = document.getElementById('editModal');
        var passwordModal = document.getElementById('passwordModal');
        if (event.target == editModal) {
            editModal.style.display = 'none';
        }
        if (event.target == passwordModal) {
            passwordModal.style.display = 'none';
        }
    }

    function openMessageModal(messageId, content) {
        // Implement message modal functionality
        alert(content); // For now, just show an alert
    }

    function confirmDelete(messageId) {
        if (confirm('Are you sure you want to delete this message?')) {
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

    // Handle password form submission
    document.getElementById('passwordForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Clear previous error messages
        document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.form-group input').forEach(el => {
            el.classList.remove('error');
            el.style.color = ''; // Reset text color
            el.value = ''; // Clear the value
        });
        
        // Get form data
        const formData = new FormData(this);
        
        // Send AJAX request
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.errors) {
                // Display validation errors
                Object.keys(data.errors).forEach(field => {
                    const input = document.getElementById(field);
                    if (field === 'current_password') {
                        input.value = 'Wrong Password';
                        input.style.color = '#ff6b6b';
                    } else {
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'error-message';
                        errorDiv.textContent = data.errors[field][0];
                        input.parentNode.appendChild(errorDiv);
                        input.classList.add('error');
                    }
                });
            } else if (data.success) {
                // Show success message and redirect
                alert(data.message);
                window.location.href = data.redirect;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
@endsection