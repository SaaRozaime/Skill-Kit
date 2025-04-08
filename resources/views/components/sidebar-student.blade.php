<div class="sidebar">
    <div>
        <a href="{{ route('home') }}">
            <button>Homepage</button>
        </a>
        <a href="{{ route('profile') }}">
            <button>Profile</button>
        </a>
        <a href="{{ route('message') }}">
            <button>Message</button>
        </a>
        <a href="{{ route('reportfeedback') }}">
            <button>Report & Feedbacks</button>
        </a>
        <a href="{{ route('aboutus') }}">
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