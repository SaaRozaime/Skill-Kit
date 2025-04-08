<!-- Sidebar -->
<div class="sidebar">
    <div>
        <a href="{{ route('homelec') }}">
            <button>Homepage</button>
        </a>
        <a href="{{ route('profile') }}">
            <button>Profile</button>
        </a>
        <a href="{{ route('messagelec') }}">
            <button>Message</button>
        </a>
        <a href="{{ route('reportfeedbacklec') }}">
            <button>Report & Feedbacks</button>
        </a>
        <a href="{{ route('aboutuslec') }}">
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