<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password - SkillKit</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      font-family: Arial, sans-serif;
      background-image: url('images/RegisterBack.png');
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .forgot-password-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .logo {
      width: 200px;
      margin-bottom: 30px;
    }

    .input-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      color: #333;
      font-weight: bold;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      box-sizing: border-box;
    }

    .submit-btn {
      background-color: #4CAF50;
      color: white;
      padding: 12px 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      width: 100%;
      margin-bottom: 15px;
      transition: background-color 0.3s;
    }

    .submit-btn:hover {
      background-color: #45a049;
    }

    .back-to-login {
      color: #666;
      text-decoration: none;
      font-size: 14px;
    }

    .back-to-login:hover {
      text-decoration: underline;
    }

    .message {
      margin-bottom: 15px;
      padding: 10px;
      border-radius: 5px;
      font-size: 14px;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>
  <div class="forgot-password-container">
    <img src="images/Logo.png" alt="SkillKit Logo" class="logo">
    <h2>Forgot Password</h2>
    
    @if(session('status'))
    <div class="message success">
      {{ session('status') }}
    </div>
    @endif

    @if($errors->any())
    <div class="message error">
      {{ $errors->first() }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="input-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>
      </div>

      <button type="submit" class="submit-btn">Send Password Reset Link</button>
      
      <a href="{{ route('login') }}" class="back-to-login">Back to Login</a>
    </form>
  </div>
</body>
</html>
