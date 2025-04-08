@extends('layouts.master')

@section('title', 'Assessment History')

@section('additional-styles')
.main-content {
    background-color: #f8f9fa;
    padding: 24px;
    display: flex;
    gap: 20px;
}

.left-section {
    width: 70%;
    display: flex;
    flex-direction: column;
    gap: 20px;
    background-color: #f8f9fa;
    padding: 24px;
    border-radius: 16px;
}

.assessment-card {
    width: 100%;
    max-width: 800px;
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    padding: 32px;
    border-radius: 16px;
    border: none;
    margin: 0 auto;
}

.assessment-history {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.assessment-history h2 {
    color: #2d3436;
    font-size: 24px;
    margin-bottom: 24px;
    font-weight: 700;
}

.dropdown {
    position: relative;
    margin-bottom: 16px;
}

.dropdown button {
    width: 100%;
    padding: 16px;
    background: #f8f9fa;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    text-align: left;
    font-size: 16px;
    font-weight: 500;
    color: #2d3436;
    cursor: pointer;
    transition: all 0.3s ease;
}

.dropdown button:hover {
    background: #f1f3f5;
    border-color: #4CAF50;
}

.dropdown-content {
    display: none;
    position: relative;
    background: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    margin-top: 8px;
    padding: 16px;
}

.dropdown-content a {
    display: block;
    padding: 12px 16px;
    color: #2d3436;
    text-decoration: none;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.dropdown-content a:hover {
    background: #f8f9fa;
}

.pass {
    background-color: #4CAF50;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}

.fail {
    background-color: #ff6b6b;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
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

.notification-box ul, .calendar-box ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.notification-box li, .calendar-box li {
    padding: 12px 0;
    border-bottom: 1px solid #f1f3f5;
    color: #636e72;
}

.notification-box li:last-child, .calendar-box li:last-child {
    border-bottom: none;
}

.calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 8px;
    margin-top: 16px;
}

.calendar .day {
    text-align: center;
    padding: 8px;
    background: #f8f9fa;
    border-radius: 4px;
    font-size: 14px;
    color: #2d3436;
}

.calendar .event {
    background: #4CAF50;
    color: white;
}

.calendar .today {
    background: #4CAF50;
    color: white;
    font-weight: 600;
}
@endsection

@section('content')
<div class="main-content">
    <!-- Left Section -->
    <div class="left-section">
        <div class="assessment-card">
            <div class="assessment-history">
                <h2>Assessment History</h2>

                <div class="dropdown">
                    <button onclick="toggleDropdown('module1')">Module 1</button>
                    <div id="module1" class="dropdown-content">
                        <a href="#">2025-03-10 (Monday) - <span class="pass">PASS</span></a>
                        <a href="#">2025-03-6 (Thursday) - <span class="fail">FAIL</span></a>
                    </div>
                </div>

                <div class="dropdown">
                    <button onclick="toggleDropdown('module2')">Module 2</button>
                    <div id="module2" class="dropdown-content">
                        <a href="#">2025-03-12 (Wednesday) - <span class="pass">PASS</span></a>
                        <a href="#">2025-03-8 (Saturday) - <span class="fail">FAIL</span></a>
                    </div>
                </div>

                <div class="dropdown">
                    <button onclick="toggleDropdown('module3')">Module 3</button>
                    <div id="module3" class="dropdown-content">
                        <a href="#">2025-03-4 (Tuesday) - <span class="pass">PASS</span></a>
                        <a href="#">2025-03-1 (Saturday) - <span class="fail">FAIL</span></a>
                    </div>
                </div>

                <div class="dropdown">
                    <button onclick="toggleDropdown('module4')">Module 4</button>
                    <div id="module4" class="dropdown-content">
                        <a href="#">2025-02-27 (Thursday) - <span class="pass">PASS</span></a>
                        <a href="#">2025-02-25 (Tuesday) - <span class="fail">FAIL</span></a>
                    </div>
                </div>

                <div class="dropdown">
                    <button onclick="toggleDropdown('module5')">Module 5</button>
                    <div id="module5" class="dropdown-content">
                        <a href="#">2025-02-10 (Saturday) - <span class="pass">PASS</span></a>
                        <a href="#">2025-02-8 (Monday) - <span class="fail">FAIL</span></a>
                    </div>
                </div>
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
@endsection

@section('scripts')
<script>
    function toggleDropdown(moduleId) {
        // Close all dropdowns
        document.querySelectorAll('.dropdown-content').forEach(function(el) {
            if (el.id !== moduleId) {
                el.style.display = "none";
            }
        });

        // Toggle the clicked dropdown
        var content = document.getElementById(moduleId);
        if (content.style.display === "block") {
            content.style.display = "none";
        } else {
            content.style.display = "block";
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
</script>
@endsection
