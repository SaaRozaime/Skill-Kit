<!-- Sidebar -->
<div class="sidebar">
  <div>
    <!-- Home Page Button -->
    <a href="{{ route('home') }}">
      <button>Homepage</button>
    </a>
    <!-- Profile Button -->
    <a href="{{ route('profile') }}">
      <button>Profile</button>
    </a>
    <!-- Message Button -->
    <a href="{{ route('message') }}">
      <button>Message</button>
    </a>
    <!-- Report & Feedbacks Button -->
    <a href="{{ route('reportfeedback') }}">
      <button>Report & Feedbacks</button>
    </a>
    <!-- About us Button -->
    <a href="{{ route('aboutus') }}">
      <button>About us</button>
    </a>
    <!-- Log Out Button -->
    <form method="POST" action="{{ route('logout') }}" class="logout-form">
      @csrf
      <button type="submit" class="sidebar-button">Log Out</button>
    </form>
  </div>
  <div class="bottom-logo">
    <img src="images/Logo.png" alt="SkillKit Logo"/>
  </div>
</div>

<style>
.sidebar {
  width: 250px;
  background-color: #F0F0F0;
  color: black;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
  border-right: 3px solid black;
  position: relative;
}

.sidebar button {
  background: transparent;
  border: 2px solid #BDC3C7;
  color: black;
  font-size: 18px;
  padding: 15px;
  text-align: left;
  width: 100%;
  margin-bottom: 10px;
  cursor: pointer;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.sidebar button:hover {
  background-color: #D3D3D3;
  border-color: #A9A9A9;
  color: #333;
}

.logout-form {
  width: 100%;
}

.sidebar-button {
  background: transparent;
  border: 2px solid #BDC3C7;
  color: black;
  font-size: 18px;
  padding: 15px;
  text-align: left;
  width: 100%;
  margin-bottom: 10px;
  cursor: pointer;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.sidebar-button:hover {
  background-color: #D3D3D3;
  border-color: #A9A9A9;
  color: #333;
}

.bottom-logo {
  margin-top: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px 0;
}

.bottom-logo img {
  width: 200px;
  height: auto;
}
</style>