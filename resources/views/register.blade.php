<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    /* Centered registration box */
    .register-box {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: rgba(217, 217, 217, 0.9);
      padding: 40px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border: 2px solid #ccc;
      animation: fadeIn 2s ease-in-out forwards;
    }

    .logo {
      width: 15vw;
      margin-bottom: 30px;
    }

    .register-input {
      width: 100%;
      max-width: 280px;
      height: 45px;
      background: white;
      border-radius: 17px;
      font-size: 16px;
      text-align: center;
      margin: 12px 0;
      padding: 10px;
      border: 1px solid #ccc;
    }

    .register-button {
      width: 100%;
      max-width: 280px;
      height: 45px;
      background-color: white;
      color: black;
      border-radius: 17px;
      font-size: 16px;
      text-align: center;
      cursor: pointer;
      border: 1px solid #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .register-button:hover {
      background-color: gray;
      color: white;
    }

    .already-have-account {
      font-size: 16px;
      color: black;
      cursor: pointer;
      text-decoration: underline;
      margin-top: 10px;
    }

    .already-have-account:hover {
      color: #555;
    }
  </style>
</head>
<body>
  <div class="background"></div>
  <img class="politeknik-logo" src="images/Poli.png" alt="Politeknik Logo" />
  <div class="register-box">
    <img class="logo" src="images/Logo.png" alt="SkillKit Logo" />
    <input class="register-input" type="text" id="full-name" placeholder="Full Name" required />
    <input class="register-input" type="email" id="email" placeholder="Email Address" required />
    <input class="register-input" type="password" id="password" placeholder="Password" required />
    <input class="register-input" type="text" id="group-code" placeholder="Group Code" />
    <input class="register-input" type="text" id="role" placeholder="Role" required />
    <div class="register-button" onclick="validateForm()">Register</div>
    <a href="{{ route('login') }}" class="already-have-account" onclick="fadeOutToLogin(event)">Already have an account?</a>
  </div>

  <script>
    function validateForm() {
      var fullName = document.getElementById('full-name').value;
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      var role = document.getElementById('role').value;

      if (!fullName || !email || !password || !role) {
        alert("Please fill in all required fields.");
      } else {
        alert("Account Registered!");
        document.body.style.animation = "fadeOut 1s ease-in-out forwards";
        setTimeout(function() {
          window.location.href = "{{ route('login') }}";
        }, 1000);
      }
    }

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
