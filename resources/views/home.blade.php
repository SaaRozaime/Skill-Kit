@extends('layouts.master')

@section('title', 'Home')

@section('additional-styles')
.left-section {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.box-link {
    display: block;
    width: 48%;
    height: 243.54px;
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
@endsection

@section('content')
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
@endsection

@section('scripts')
<script>
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
