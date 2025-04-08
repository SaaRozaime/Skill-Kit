@extends('layouts.master')

@section('title', 'Profile')

@section('additional-styles')
.main-content {
    display: flex;
    justify-content: space-between;
    padding: 40px;
    background-image: url('{{ asset('images/HomeBack.png') }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    gap: 24px;
}

.profile-container {
    width: 70%;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 16px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 32px;
}

.profile-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 32px;
    text-align: center;
}

.profile-picture {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    margin-bottom: 24px;
    border: 3px solid #4CAF50;
    padding: 3px;
    object-fit: cover;
}

.profile-name {
    font-size: 28px;
    font-weight: 600;
    color: #2d3436;
    margin-bottom: 8px;
}

.profile-role {
    font-size: 18px;
    color: #636e72;
    margin-bottom: 24px;
}

.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    font-size: 14px;
    color: #636e72;
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 12px;
    background-color: #f8f9fa;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    color: #2d3436;
    cursor: default;
}

.button-group {
    display: flex;
    gap: 16px;
    justify-content: flex-start;
    margin-top: 32px;
}

.action-button {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    background-color: #4CAF50;
    color: white;
}

.action-button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

.right-section {
    width: 28%;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.notification-box {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 16px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 24px;
    flex-grow: 1;
}

.notification-box h3 {
    color: #2d3436;
    margin-bottom: 20px;
    font-size: 20px;
    font-weight: 600;
}

.no-messages {
    text-align: center;
    color: #636e72;
    font-style: italic;
}
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <img src="{{ asset('images/JAKE.jpg') }}" alt="Profile Picture" class="profile-picture"/>
        <h2 class="profile-name">{{ auth()->user()->name }}</h2>
        <p class="profile-role">{{ ucfirst(auth()->user()->role) }}</p>
    </div>

    <div class="form-group">
        <label>Name:</label>
        <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
    </div>

    <div class="form-group">
        <label>Email:</label>
        <input type="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
    </div>

    <div class="form-group">
        <label>Role:</label>
        <input type="text" class="form-control" value="{{ ucfirst(auth()->user()->role) }}" disabled>
    </div>

    <div class="form-group">
        <label>Member Since:</label>
        <input type="text" class="form-control" value="{{ auth()->user()->created_at->format('F d, Y') }}" disabled>
    </div>

    <div class="button-group">
        <a href="{{ route('profile.edit') }}" class="action-button">Edit Profile</a>
        <a href="{{ route('profile.password') }}" class="action-button">Change Password</a>
    </div>
</div>

<div class="right-section">
    <div class="notification-box">
        <h3>Received Messages</h3>
        @if(isset($messages) && $messages->count() > 0)
            @foreach($messages as $message)
                <div class="notification-item">
                    <!-- Message content here -->
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
