<!-- Sidebar -->
<div class="sidebar">
    <div>
        <a href="{{ route('homeadmin') }}">
            <button>Homepage</button>
        </a>
        <a href="{{ route('profileadmin') }}">
            <button>Profile</button>
        </a>
        <a href="{{ route('messageadmin') }}">
            <button>Message</button>
        </a>
        <a href="{{ route('reportfeedbackadmin') }}">
            <button>Report & Feedbacks</button>
        </a>
        <a href="{{ route('aboutusadmin') }}">
            <button>About us</button>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    </div>
    <div class="bottom-logo">
        <img src="{{ asset('images/Logo.png') }}" alt="SkillKit Logo"/>
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
</style>