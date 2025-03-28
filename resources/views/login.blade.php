<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    /* Prevent scrolling */
    html, body {
      height: 100%;
      margin: 0;
      overflow: hidden;
      transition: opacity 1s ease-in;
    }

    /* Main container styles */
    .container {
      display: flex;
      height: 100vh;
      opacity: 0; /* Initially hidden */
      transition: opacity 1s ease-in; /* Fade-in effect */
    }

    /* Silk background taking majority of the space, with blur effect */
    .silk-background {
      flex: 2;
      background-image: url('images/SilkyWhite.png');
      background-size: cover;
      background-position: center;
      height: 100%;
      filter: blur(8px); /* Added blur effect */
      opacity: 0.6; /* Slightly transparent for a softer background */
    }

    /* Gray background for the login form */
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
    .login-input {
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

    .login-input::placeholder {
      color: #aaa;
      text-align: left;
    }

    /* Highlighted input fields with errors */
    .error-input {
      border: 1px solid red;
    }

    /* Login button */
    .login-button {
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

    .login-button:hover {
      background-color: gray;
      color: white;
    }

    /* Links container */
    .links-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      margin-top: 10px;
    }

    /* Links styling */
    .forgot-password,
    .create-account {
      font-family: Lexend, sans-serif;
      font-size: 18px;
      color: black;
      cursor: pointer;
      text-decoration: underline;
    }

    .forgot-password:hover,
    .create-account:hover {
      color: #555;
    }

    /* Politeknik logo positioning at top left with slightly bigger size */
    .politeknik-logo {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 12vw; /* Adjusted size to match the register page size */
      image-rendering: smooth; /* Smooth the logo image */
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
<body onload="fadeIn()">
  <div class="container">
    <!-- Silk Background Section -->
    <div class="silk-background"></div>

    <!-- Gray Background Section (Login Form) -->
    <div class="gray-background">
      <img class="logo" src="images/Logo.png" alt="SkillKit Logo" />
      <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
        <input id="email" name="email" class="login-input @error('email') error-input @enderror" type="email" placeholder="Email" value="{{ old('email') }}" />
        @error('email')
          <div class="error-message">{{ $message }}</div>
        @enderror
        <input id="password" name="password" class="login-input @error('password') error-input @enderror" type="password" placeholder="Password" />
        @error('password')
          <div class="error-message">{{ $message }}</div>
        @enderror
        <div class="login-button" onclick="document.getElementById('loginForm').submit()">Login</div>
      </form>
      <div class="links-container">
        <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
        <a href="{{ route('register') }}" class="create-account">Create Your Account</a>
      </div>
    </div>
  </div>
  <img class="politeknik-logo" src="images/Poli.png" alt="Politeknik Logo" />

  <script>
    // Function to handle fade-in effect after page load
    function fadeIn() {
      document.querySelector('.container').style.opacity = 1;
    }

    // Function to handle fade-out effect and then redirect
    function fadeOutAndRedirect(url) {
      document.querySelector('.container').style.opacity = 0;
      setTimeout(function() {
        window.location.href = url;
      }, 1000);
    }

    // Add event listener to the "Create Your Account" link
    document.querySelector('.create-account').addEventListener('click', function(event) {
      event.preventDefault();
      fadeOutAndRedirect(this.href);
    });
  </script>
</body>
</html>
