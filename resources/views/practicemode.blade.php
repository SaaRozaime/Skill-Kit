@extends('layouts.master')

@section('title', 'Practice Mode')

@section('additional-styles')
<style>
    .main-content {
        display: flex;
        gap: 20px;
        padding: 24px;
        background-color: #f8f9fa;
    }

    .left-section {
        width: 70%;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .practice-card {
        background: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        padding: 32px;
        border-radius: 16px;
        border: none;
    }

    .practice-header {
        margin-bottom: 24px;
    }

    .practice-header h2 {
        margin: 0;
        font-size: 24px;
        color: #2d3436;
        font-weight: 700;
    }

    .practice-content {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .course-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 12px;
        border: 1px solid #e0e0e0;
    }

    .course-section h3 {
        margin: 0 0 16px 0;
        color: #2d3436;
        font-size: 18px;
    }

    .skill-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .skill-item {
        display: flex;
        align-items: center;
        padding: 12px;
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s ease;
    }

    .skill-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .skill-name {
        flex: 1;
        font-weight: 500;
        color: #2d3436;
    }

    .practice-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .practice-button:hover {
        background-color: #45a049;
    }

    .right-section {
        width: 30%;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .notification-box {
        background: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        padding: 24px;
        border-radius: 16px;
        border: none;
    }

    .notification-header {
        margin-bottom: 16px;
    }

    .notification-header h3 {
        margin: 0;
        font-size: 18px;
        color: #2d3436;
        font-weight: 600;
    }

    .notification-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .notification-item {
        padding: 12px;
        background: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
    }

    .notification-item p {
        margin: 0;
        color: #2d3436;
        font-size: 14px;
    }

    .notification-time {
        font-size: 12px;
        color: #636e72;
        margin-top: 4px;
    }
</style>
@endsection

@section('content')
<div class="main-content">
    <!-- Left Section -->
    <div class="left-section">
        <div class="practice-card">
            <div class="practice-header">
                <h2>Practice Mode</h2>
            </div>
            <div class="practice-content">
                <div class="course-section">
                    <h3>{{ Auth::user()->course }}</h3>
                    <div class="skill-list">
                        @if(Auth::user()->course == 'Midwifery')
                            <div class="skill-item">
                                <span class="skill-name">Basic Midwifery Skills</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Prenatal Care</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Labor and Delivery</span>
                                <button class="practice-button">Practice</button>
                            </div>
                        @elseif(Auth::user()->course == 'Cardiovascular Technology')
                            <div class="skill-item">
                                <span class="skill-name">ECG Interpretation</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Cardiac Catheterization</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Vascular Procedures</span>
                                <button class="practice-button">Practice</button>
                            </div>
                        @elseif(Auth::user()->course == 'Nursing')
                            <div class="skill-item">
                                <span class="skill-name">Basic Nursing Skills</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Patient Assessment</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Medication Administration</span>
                                <button class="practice-button">Practice</button>
                            </div>
                        @elseif(Auth::user()->course == 'Paramedic')
                            <div class="skill-item">
                                <span class="skill-name">Emergency Response</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Trauma Care</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Advanced Life Support</span>
                                <button class="practice-button">Practice</button>
                            </div>
                        @elseif(Auth::user()->course == 'Public Health')
                            <div class="skill-item">
                                <span class="skill-name">Epidemiology</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Health Promotion</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Disease Prevention</span>
                                <button class="practice-button">Practice</button>
                            </div>
                        @elseif(Auth::user()->course == 'Dental Hygiene')
                            <div class="skill-item">
                                <span class="skill-name">Oral Assessment</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Dental Cleaning</span>
                                <button class="practice-button">Practice</button>
                            </div>
                            <div class="skill-item">
                                <span class="skill-name">Patient Education</span>
                                <button class="practice-button">Practice</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="right-section">
        <div class="notification-box">
            <div class="notification-header">
                <h3>Received Messages</h3>
            </div>
            <div class="notification-list">
                @forelse($messages as $message)
                    <div class="notification-item" data-message-id="{{ $message->id }}">
                        <p><strong>{{ $message->sender->name }}</strong>: {{ Str::limit($message->content, 50) }}</p>
                        <div class="message-actions">
                            <button class="read-button" onclick="openMessageModal('{{ $message->id }}', '{{ $message->content }}')">Read</button>
                            <button class="delete-button" onclick="confirmDelete('{{ $message->id }}')">Delete</button>
                        </div>
                        <span class="notification-time">{{ $message->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <div class="notification-item">
                        <p>No messages received.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function openMessageModal(messageId, content) {
        alert(content);
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
