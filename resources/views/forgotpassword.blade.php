<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Reset Password - SkillKit</title>
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
      opacity: 0;
      transition: opacity 1s ease-in;
    }

    /* Background styles */
    .background {
      flex: 2;
      background-image: url('images/SilkyWhite.png');
      background-size: cover;
      background-position: center;
      height: 100%;
      filter: blur(8px);
      opacity: 0.6;
    }

    /* Form container */
    .form-container {
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

    /* Logo styles */
    .logo {
      width: 15vw;
      margin-bottom: 30px;
      image-rendering: smooth;
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
    .input-field {
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

    .input-field::placeholder {
      color: #aaa;
      text-align: left;
    }

    /* Highlighted input fields with errors */
    .error-input {
      border: 1px solid red;
    }

    /* Submit button */
    .submit-button {
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

    .submit-button:hover {
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

    /* Success message styling */
    .success-message {
      color: green;
      font-size: 14px;
      text-align: center;
      margin-top: 10px;
    }

    /* Politeknik logo */
    .politeknik-logo {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 12vw;
      image-rendering: smooth;
    }
  </style>
</head>
<body onload="fadeIn()">
  <div class="container">
    <!-- Background -->
    <div class="background"></div>

    <!-- Form Container -->
    <div class="form-container">
      <img class="logo" src="images/Logo.png" alt="SkillKit Logo" />
      <h2>Reset Password</h2>
      @if (session('error'))
        <div class="error-message">
          {{ session('error') }}
        </div>
      @endif
      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input 
          type="email" 
          name="email" 
          class="input-field @error('email') error-input @enderror" 
          placeholder="Enter your email"
          value="{{ old('email') }}"
        />
        @error('email')
          <div class="error-message">{{ $message }}</div>
        @enderror
        <input 
          type="password" 
          name="password" 
          class="input-field @error('password') error-input @enderror" 
          placeholder="New Password"
        />
        @error('password')
          <div class="error-message">{{ $message }}</div>
        @enderror
        <input 
          type="password" 
          name="password_confirmation" 
          class="input-field" 
          placeholder="Confirm New Password"
        />
        <button type="submit" class="submit-button">Reset Password</button>
      </form>
      <a href="{{ route('login') }}" class="back-to-login">Back to Login</a>
    </div>
  </div>
  <img class="politeknik-logo" src="images/Poli.png" alt="Politeknik Logo" />

  <script>
    function fadeIn() {
      document.querySelector('.container').style.opacity = 1;
    }
  </script>
</body>
</html>
