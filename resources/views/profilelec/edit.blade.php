@extends('layouts.master')

@section('title', 'Edit Profile')

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

.profile-picture {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    margin-bottom: 24px;
    border: 3px solid #4CAF50;
    padding: 3px;
    object-fit: cover;
}

.profile-title {
    font-size: 28px;
    font-weight: 600;
    color: #2d3436;
    margin-bottom: 24px;
}

.edit-form {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 24px;
}

.form-label {
    display: block;
    font-size: 16px;
    font-weight: 500;
    color: #2d3436;
    margin-bottom: 8px;
}

.form-input {
    width: 100%;
    padding: 12px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    color: #2d3436;
    transition: all 0.3s ease;
}

.form-input:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
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

.save-button {
    background-color: #4CAF50;
    color: white;
}

.save-button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

.cancel-button {
    background-color: #ff6b6b;
    color: white;
}

.cancel-button:hover {
    background-color: #ff5252;
    transform: translateY(-2px);
}
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <img src="{{ asset('images/JAKE.jpg') }}" alt="Profile Picture" class="profile-picture"/>
        <h2 class="profile-title">Edit Profile</h2>
    </div>

    <form class="edit-form" action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" name="name" class="form-input" value="{{ auth()->user()->name }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-input" value="{{ auth()->user()->email }}" required>
        </div>

        <div class="button-group">
            <button type="submit" class="action-button save-button">Save Changes</button>
            <a href="{{ route('profile') }}" class="action-button cancel-button">Cancel</a>
        </div>
    </form>
</div>
@endsection 