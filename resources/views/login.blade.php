<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      justify-content: center; /* Center the items horizontally */
      align-items: center; /* Center the items vertically */
      flex-direction: column;
      padding: 20px;
      box-sizing: border-box;
      border: 2px solid #bbb; /* Added border to the gray part */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added undershadow */
    }

    /* SkillKit logo positioning */
    .logo {
      width: 15vw;
      margin-bottom: 30px; /* Adjusted margin for better positioning */
      image-rendering: smooth; /* Smooth the logo image */
    }

    /* Input fields */
    .login-input {
      width: 100%;
      max-width: 250px;
      height: 40px;
      background: white;
      border-radius: 17px;
      font-family: Lexend, sans-serif;
      font-size: 18px;
      color: black;
      text-align: center;
      margin: 10px 0;
      padding: 5px;
      border: 1px solid #ccc;
    }

    .login-input::placeholder {
      color: #aaa;
    }

    /* Highlighted input fields with errors */
    .error-input {
      border: 1px solid red;
    }

    /* Login button */
    .login-button {
      width: 100%;
      max-width: 250px;
      height: 40px;
      background-color: white;
      color: black;
      border-radius: 17px;
      font-family: Lexend, sans-serif;
      font-size: 18px;
      text-align: center;
      cursor: pointer;
      margin-top: 20px;
      border: 1px solid #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-button:hover {
      background-color: gray;
      color: white;
    }

    /* Links styling */
    .forgot-password,
    .create-account {
      font-family: Lexend, sans-serif;
      font-size: 18px;
      color: black;
      cursor: pointer;
      text-decoration: underline;
      margin-top: 10px;
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
      margin-top: -8px;
      text-align: center;
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
      <input id="email" class="login-input" type="text" placeholder="Email" />
      <div id="email-error" class="error-message"></div>
      <input id="password" class="login-input" type="password" placeholder="Password" />
      <div id="password-error" class="error-message"></div>
      <div class="login-button" onclick="validateLogin()">Login</div>
      <!-- Forgot Password Link -->
      <a href="#" class="forgot-password">Forgot password?</a>
      <a href="#" class="create-account">Create Your Account</a>
    </div>
  </div>
  <img class="politeknik-logo" src="images/Poli.png" alt="Politeknik Logo" />

  <script>
    // Function to handle fade-in effect after page load
    function fadeIn() {
      document.querySelector('.container').style.opacity = 1; // Make container visible
    }

    // Function to handle fade-out effect and then redirect
    function fadeOutAndRedirect(url) {
      // Trigger fade-out effect by setting opacity to 0
      document.querySelector('.container').style.opacity = 0;

      // Wait for the fade-out to finish (1 second) before redirecting
      setTimeout(function() {
        window.location.href = url; // Redirect to the given URL
      }, 1000); // Duration matches the fade-out transition time
    }

    // Function to validate login
    function validateLogin() {
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const emailError = document.getElementById('email-error');
      const passwordError = document.getElementById('password-error');
      const emailInput = document.getElementById('email');
      const passwordInput = document.getElementById('password');

      // Clear previous error messages and highlight
      emailError.innerHTML = '';
      passwordError.innerHTML = '';
      emailInput.classList.remove('error-input');
      passwordInput.classList.remove('error-input');

      // Check if both fields are filled
      let valid = true;

      if (email === '') {
        emailError.innerHTML = 'Email is required';
        emailInput.classList.add('error-input');
        valid = false;
      }

      if (password === '') {
        passwordError.innerHTML = 'Password is required';
        passwordInput.classList.add('error-input');
        valid = false;
      }

      if (valid) {
        // Redirect to home.blade.php if both fields are filled
        fadeOutAndRedirect('{{ url('/home') }}'); // Replace with your actual home URL
      }
    }

    // Add event listeners to the "Forgot password?" and "Create Your Account" links
    document.querySelector('.forgot-password').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      fadeOutAndRedirect('{{ url('/forgotpassword') }}'); // Redirect to forgot password page
    });

    document.querySelector('.create-account').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      fadeOutAndRedirect('{{ route('register') }}'); // Redirect to create account page
    });
  </script>
</body>
</html>
