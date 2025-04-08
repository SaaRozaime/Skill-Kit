@extends('layouts.master')

@section('title', 'Assessment Schedule')

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

.schedule-card {
    width: 100%;
    max-width: 800px;
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    padding: 32px;
    border-radius: 16px;
    border: none;
    margin: 0 auto;
}

.calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 8px;
    margin-top: 16px;
}

.calendar .day {
    text-align: center;
    padding: 12px;
    background: #f8f9fa;
    border-radius: 8px;
    font-size: 14px;
    color: #2d3436;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.calendar .day:hover {
    background: #f1f3f5;
    transform: translateY(-2px);
}

.calendar .day.event {
    background: #4CAF50;
    color: white;
}

.calendar .day.today {
    background: #4CAF50;
    color: white;
    font-weight: 600;
}

.day-details {
    display: none;
    position: absolute;
    background: #ffffff;
    padding: 16px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 10;
    width: 200px;
    left: 50%;
    transform: translateX(-50%);
    top: -120px;
}

.day-details h3 {
    color: #2d3436;
    font-size: 16px;
    margin-bottom: 8px;
    font-weight: 600;
}

.day-details p {
    color: #636e72;
    font-size: 14px;
    margin-bottom: 4px;
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
@endsection

@section('content')
<div class="main-content">
    <!-- Left Section -->
    <div class="left-section">
        <div class="schedule-card">
            <h2>Assessment Schedule</h2>
            <div class="calendar" id="calendar">
                <!-- Days of the week -->
                <div class="day">Mon</div>
                <div class="day">Tue</div>
                <div class="day">Wed</div>
                <div class="day">Thu</div>
                <div class="day">Fri</div>
                <div class="day">Sat</div>
                <div class="day">Sun</div>

                <!-- Calendar days (1 to 31) will be added here -->
            </div>

            <div id="details-popup" class="day-details">
                <h3 id="details-title">Assessment Details</h3>
                <p id="details-content">Event: Monthly Check up</p>
                <p id="details-mentor">Mentor: Sir Ilham</p>
                <p id="details-venue">Venue: Lab 01</p>
                <p id="details-time">Time: 3:00 pm</p>
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
    const medicalEvents = [
        { title: 'Monthly Checkup', mentor: 'Dr. Sarah', venue: 'Room 202', time: '10:00 am' },
        { title: 'First Aid Training', mentor: 'Dr. John', venue: 'Room 305', time: '2:00 pm' },
        { title: 'Surgical Skills Workshop', mentor: 'Dr. Patel', venue: 'Room 404', time: '11:00 am' },
        { title: 'Emergency Medicine Simulation', mentor: 'Dr. Williams', venue: 'Room 100', time: '1:00 pm' },
        { title: 'Radiology Review', mentor: 'Dr. Kim', venue: 'Room 302', time: '9:00 am' }
    ];

    const calendarDays = document.querySelector('.calendar');
    const numDays = 31;

    // Assign a unique event for each day
    const dayEvents = [];
    for (let i = 1; i <= numDays; i++) {
        dayEvents.push(medicalEvents[Math.floor(Math.random() * medicalEvents.length)]);
    }

    // Create the days in the calendar
    for (let i = 1; i <= numDays; i++) {
        const dayDiv = document.createElement('div');
        dayDiv.classList.add('day');
        dayDiv.innerText = i;

        // Add mouseover event to show details
        dayDiv.onmouseover = function () {
            showDetails(i, dayDiv);
        };

        // Add click event to keep the popup visible
        dayDiv.onclick = function () {
            if (currentHoveredDay === i) {
                hideDetails();
            } else {
                showDetails(i, dayDiv);
            }
        };

        calendarDays.appendChild(dayDiv);
    }

    let currentHoveredDay = null;

    function showDetails(day, dayElement) {
        if (currentHoveredDay === day) return;
        currentHoveredDay = day;

        const eventData = dayEvents[day - 1];
        const detailsPopup = document.getElementById('details-popup');
        document.getElementById('details-title').innerText = `Assessment on Day ${day}`;
        document.getElementById('details-content').innerText = `Event: ${eventData.title}`;
        document.getElementById('details-mentor').innerText = `Mentor: ${eventData.mentor}`;
        document.getElementById('details-venue').innerText = `Venue: ${eventData.venue}`;
        document.getElementById('details-time').innerText = `Time: ${eventData.time}`;

        const rect = dayElement.getBoundingClientRect();
        detailsPopup.style.display = 'block';
        detailsPopup.style.top = `${rect.top - detailsPopup.offsetHeight}px`;
        detailsPopup.style.left = `${rect.left + (rect.width / 2) - (detailsPopup.offsetWidth / 2)}px`;
    }

    function hideDetails() {
        const detailsPopup = document.getElementById('details-popup');
        detailsPopup.style.display = 'none';
        currentHoveredDay = null;
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
