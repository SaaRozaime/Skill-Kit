<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <style>
    /* Prevent scrolling on the entire page */
    html, body {
      height: 100%;
      margin: 0;
      overflow: hidden;
      background-color: #f5f5f5; /* Light background color */
    }

    /* The main container */
    .main-container {
      width: 100%;
      height: 100vh; /* Full viewport height */
      position: relative;
      overflow: hidden; /* Prevent scrolling */
      z-index: 2; /* Ensure the main container is above the background */
      opacity: 0; /* Initially hidden */
      transition: opacity 0.5s ease-in-out; /* Fade-in transition */
    }

    /* Apply subtle blur to the background */
    .background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('images/RegisterBack.png'); /* Background Image */
      background-size: cover; /* Ensure the image covers the entire viewport */
      background-position: center; /* Keep the image centered */
      background-repeat: no-repeat; /* Prevent the image from repeating */
      filter: blur(5px); /* Reduced blur effect */
      opacity: 0.7; /* Reduced opacity */
      z-index: -1; /* Ensure the background is behind everything */
    }

    /* Style for the grey box */
    .grey-box {
      width: 450px;
      height: 320px; /* Increased height slightly */
      left: 50%;
      top: 310px; /* Moved up slightly */
      position: absolute;
      background: #D9D9D9;
      border: 1px solid #B0B0B0; /* Lighter border color */
      transform: translateX(-50%);
      border-radius: 20px;
      z-index: 2; /* Ensure grey box is above the background */
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15); /* Softer shadow */
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding-top: 15px; /* Creates space inside the box */
    }

    /* Style for the Skill Kit logo */
    .skillkit-logo {
      width: 200px; /* Increased size */
      height: auto; /* Maintain aspect ratio */
      margin-bottom: 10px; /* Reduced space between logo and input */
      margin-top: -20px; /* Moved upwards */
      z-index: 3;
    }

    /* Style for input field */
    input[type="email"] {
      width: 315px;
      height: 30px;
      background: white;
      border-radius: 17px;
      text-align: center;
      font-size: 16px;
      color: black;
      font-family: Lexend;
      font-weight: 400;
      z-index: 3; /* Ensure input is above the background */
      margin-bottom: 15px; /* Space between input and button */
    }

    /* Style for button */
    .button {
      width: 225px;
      height: 40px;
      background: rgba(67, 68, 89, 0.59);
      border-radius: 17px;
      text-align: center;
      line-height: 40px; /* Vertically center text */
      font-size: 16px;
      font-family: Lexend;
      font-weight: 400;
      color: black;
      cursor: pointer;
      z-index: 3; /* Ensure button is above the background */
    }

    /* Politeknik logo positioning at top left with slightly bigger size */
    .poli-logo {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 12vw; /* Match the width from the login page */
      height: auto; /* Keep the aspect ratio */
      z-index: 3;
    }
  </style>
</head>
<body onload="fadeIn()">
  <div class="main-container">
    <!-- Background image -->
    <div class="background"></div>

    <!-- Politeknik Logo (Left) -->
    <img class="poli-logo" src="images/Poli.png" />

    <!-- Grey Box -->
    <div class="grey-box">
      <!-- Skill Kit Logo (Bigger & Moved Up) -->
      <img class="skillkit-logo" src="images/Logo.png" />

      <!-- Email Input -->
      <input type="email" id="emailInput" placeholder="Enter your email" />

      <!-- Continue Button -->
      <div id="continueButton" class="button">Continue</div>
    </div>
  </div>

  <script>
    // Function to validate email format
    function validateEmail(email) {
      const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9]{2,}$/;
      return re.test(String(email).toLowerCase());
    }

    // Function to handle fade-in effect
    function fadeIn() {
      // Ensure the content fades in after loading
      setTimeout(function() {
        document.querySelector('.main-container').style.opacity = 1;
      }, 100); // Small delay before fading in
    }

    // Function to handle fade-out effect
    function fadeOut() {
      // Fade out the entire page
      document.querySelector('.main-container').style.opacity = 0;
    }

    // Add event listener to the continue button
    document.getElementById("continueButton").addEventListener("click", function() {
      const email = document.getElementById("emailInput").value;
      
      if (email === "") {
        alert("Please enter your email address.");
      } else if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
      } else {
        // Add fade-out effect before redirecting
        fadeOut();

        setTimeout(function() {
          alert("Email submitted successfully!");
          window.location.href = "{{ route('login') }}"; // Redirect to login page after the animation
        }, 500); // Wait for 500ms (duration of the fade-out) before redirecting
      }
    });
  </script>
</body>
</html>
