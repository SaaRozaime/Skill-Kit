<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Register</title>
  <style>
    /* Prevent scrolling */
    html, body {
      height: 100%;
      margin: 0;
      overflow: hidden;
      opacity: 0;
      animation: fadeIn 1.5s ease-in-out forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeOut {
      from { opacity: 1; transform: translateY(0); }
      to { opacity: 0; transform: translateY(-20px); }
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      height: 100%;
      width: 100%;
    }

    /* Blurred background image */
    .background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('images/RegisterBack.png');
      background-size: cover;
      background-position: center;
      filter: blur(5px);
      opacity: 0.7;
      z-index: -1;
    }

    /* Politeknik logo positioning */
    .politeknik-logo {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 12vw;
    }

    /* Gray background for the registration form */
    .gray-background {
      flex: 1;
      background-color: #D9D9D9;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 20px;
      box-sizing: border-box;
      border: 2px solid #bbb;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Form container */
    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
      max-width: 250px;
      gap: 10px;
    }

    /* Input fields */
    .register-input {
      width: 100%;
      height: 40px;
      background: white;
      border-radius: 17px;
      font-family: Lexend, sans-serif;
      font-size: 18px;
      color: black;
      text-align: left;
      padding: 0 20px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    .register-input::placeholder {
      color: #aaa;
      text-align: left;
    }

    /* Highlighted input fields with errors */
    .error-input {
      border: 1px solid red;
    }

    /* Register button */
    .register-button {
      width: 100%;
      height: 40px;
      background-color: white;
      color: black;
      border-radius: 17px;
      font-family: Lexend, sans-serif;
      font-size: 18px;
      text-align: center;
      cursor: pointer;
      border: 1px solid #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 10px;
    }

    .register-button:hover {
      background-color: gray;
      color: white;
    }

    /* Back to login link */
    .back-to-login {
      font-family: Lexend, sans-serif;
      font-size: 18px;
      color: black;
      cursor: pointer;
      text-decoration: underline;
      margin-top: 10px;
    }

    .back-to-login:hover {
      color: #555;
    }

    /* Error message styling */
    .error-message {
      color: red;
      font-size: 14px;
      text-align: center;
      margin-top: -5px;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Background -->
    <div class="background"></div>

    <!-- Gray Background Section (Registration Form) -->
    <div class="gray-background">
      <img class="logo" src="images/Logo.png" alt="SkillKit Logo" />
      <form id="registerForm" method="POST" action="{{ route('register') }}">
        @csrf
        @if($errors->any())
            <div class="error-message" style="margin-bottom: 15px;">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <input 
          type="text" 
          name="name" 
          class="register-input @error('name') error-input @enderror" 
          placeholder="Name"
          value="{{ old('name') }}"
        />
        @error('name')
          <div class="error-message">{{ $message }}</div>
        @enderror
        <input 
          type="email" 
          name="email" 
          class="register-input @error('email') error-input @enderror" 
          placeholder="Email"
          value="{{ old('email') }}"
        />
        @error('email')
          <div class="error-message">{{ $message }}</div>
        @enderror
        <input 
          type="password" 
          name="password" 
          class="register-input @error('password') error-input @enderror" 
          placeholder="Password"
        />
        @error('password')
          <div class="error-message">{{ $message }}</div>
        @enderror
        <input 
          type="password" 
          name="password_confirmation" 
          class="register-input" 
          placeholder="Confirm Password"
        />
        <select name="role" id="role" class="register-input @error('role') error-input @enderror" onchange="toggleCourseField()">
          <option value="">Select Role</option>
          <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
          <option value="lecturer" {{ old('role') == 'lecturer' ? 'selected' : '' }}>Lecturer</option>
          <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        @error('role')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <div id="courseField" style="display: none;">
          <select name="course" class="register-input @error('course') error-input @enderror">
            <option value="">Select Course</option>
            <option value="Midwifery" {{ old('course') == 'Midwifery' ? 'selected' : '' }}>Midwifery</option>
            <option value="Cardiovascular Technology" {{ old('course') == 'Cardiovascular Technology' ? 'selected' : '' }}>Cardiovascular Technology</option>
            <option value="Nursing" {{ old('course') == 'Nursing' ? 'selected' : '' }}>Nursing</option>
            <option value="Paramedic" {{ old('course') == 'Paramedic' ? 'selected' : '' }}>Paramedic</option>
            <option value="Public Health" {{ old('course') == 'Public Health' ? 'selected' : '' }}>Public Health</option>
            <option value="Dental Hygiene" {{ old('course') == 'Dental Hygiene' ? 'selected' : '' }}>Dental Hygiene</option>
          </select>
          @error('course')
            <div class="error-message">{{ $message }}</div>
          @enderror
        </div>
        <div class="register-button" onclick="document.getElementById('registerForm').submit()">Register</div>
      </form>
      <a href="{{ route('login') }}" class="back-to-login">Return to Login</a>
    </div>
  </div>

  <script>
    function toggleCourseField() {
      const roleSelect = document.getElementById('role');
      const courseField = document.getElementById('courseField');
      
      if (roleSelect.value === 'student') {
        courseField.style.display = 'block';
      } else {
        courseField.style.display = 'none';
      }
    }

    // Call toggleCourseField on page load to handle pre-selected values
    document.addEventListener('DOMContentLoaded', function() {
      toggleCourseField();
    });

    function fadeOutToLogin(event) {
      event.preventDefault();
      document.body.style.animation = "fadeOut 1s ease-in-out forwards";
      setTimeout(function() {
        window.location.href = "{{ route('login') }}";
      }, 1000);
    }
  </script>
</body>
</html>
