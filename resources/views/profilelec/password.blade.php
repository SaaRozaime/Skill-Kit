@extends('layouts.master')

@section('title', 'Change Password')

@section('additional-styles')
.main-content {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 40px;
    background-image: url('{{ asset('images/HomeBack.png') }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

.profile-container {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 16px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 32px;
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
}

.profile-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 32px;
    text-align: center;
}

.profile-info {
    width: 100%;
    max-width: 600px;
    margin: 0 auto 32px;
}

.info-group {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 16px;
}

.info-label {
    font-size: 14px;
    color: #636e72;
    margin-bottom: 4px;
}

.info-value {
    font-size: 16px;
    color: #2d3436;
    font-weight: 500;
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

.button-group {
    display: flex;
    gap: 16px;
    justify-content: center;
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
}

.edit-button {
    background-color: #4CAF50;
    color: white;
}

.edit-button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

.change-password-button {
    background-color: #3498db;
    color: white;
}

.change-password-button:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

.info-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    font-size: 16px;
    color: #2d3436;
}

.info-group input:focus {
    outline: none;
    border-color: #4CAF50;
}
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <img src="{{ asset('images/JAKE.jpg') }}" alt="Profile Picture" class="profile-picture"/>
        <h2 class="profile-name">Change Password</h2>
        <p class="profile-role">{{ ucfirst(auth()->user()->role) }}</p>
    </div>

    <div class="profile-info">
        <form action="{{ route('profile.password.update') }}" method="POST">
            @csrf
            <div class="info-group">
                <div class="info-label">Current Password</div>
                <input type="password" name="current_password" required>
            </div>

            <div class="info-group">
                <div class="info-label">New Password</div>
                <input type="password" name="password" required>
            </div>

            <div class="info-group">
                <div class="info-label">Confirm New Password</div>
                <input type="password" name="password_confirmation" required>
            </div>

            <div class="button-group">
                <button type="submit" class="action-button edit-button">Save Changes</button>
                <a href="{{ route('profile') }}" class="action-button change-password-button">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection 