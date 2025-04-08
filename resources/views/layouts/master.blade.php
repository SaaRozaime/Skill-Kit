<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - SkillKit Dashboard</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
            position: relative;
            opacity: 0;
            animation: fadeIn 1.5s ease-in-out forwards;
            background-color: #f8f9fa;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .top-bar {
            width: 100%;
            height: 140px;
            background-color: #ffffff;
            color: #2d3436;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 24px;
            position: relative;
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .top-bar-left {
            display: flex;
            align-items: center;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 16px;
            border: 3px solid #4CAF50;
            padding: 2px;
        }

        .top-bar-left span {
            font-size: 20px;
            font-weight: 600;
            color: #2d3436;
        }

        .politeknik-logo {
            position: absolute;
            top: -8px;
            right: 48px;
            max-width: 200px;
            height: auto;
            object-fit: contain;
        }

        .container {
            display: flex;
            height: calc(100vh - 140px);
            background-color: transparent;
        }

        .sidebar {
            width: 250px;
            background-color: #ffffff;
            color: #2d3436;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            border-right: 1px solid #e0e0e0;
            box-shadow: 2px 0 4px rgba(0, 0, 0, 0.05);
        }

        .sidebar button {
            background: transparent;
            border: none;
            color: #2d3436;
            font-size: 16px;
            padding: 12px 20px;
            text-align: left;
            width: 100%;
            margin-bottom: 8px;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar button:hover {
            background-color: #f8f9fa;
            color: #4CAF50;
        }

        .main-content {
            flex-grow: 1;
            display: flex;
            padding: 24px;
            justify-content: space-between;
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .box-button {
            width: 100%;
            height: 100%;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            font-size: 20px;
            font-weight: 500;
            color: #2d3436;
            cursor: pointer;
            border-radius: 16px;
            border: none;
            transition: all 0.3s ease;
            padding: 24px;
            text-align: left;
        }

        .box-button:hover {
            background-color: #f8f9fa;
            transform: translateY(-4px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .notification-box {
            width: 100%;
            height: 100%;
            background: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            padding: 24px;
            border-radius: 16px;
            overflow-y: auto;
            border: none;
        }

        .notification-box h3 {
            color: #2d3436;
            margin-bottom: 20px;
            font-size: 20px;
            text-align: left;
            padding-bottom: 16px;
            border-bottom: 2px solid #f1f3f5;
            font-weight: 700;
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

        @yield('additional-styles')
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="top-bar-left">
            <img src="{{ asset('images/FINN.png') }}" alt="Profile" class="profile-img">
            <span class="user-name">{{ Auth::user()->name }}</span>
        </div>
        <img src="{{ asset('images/Poli.png') }}" alt="Politeknik Logo" class="politeknik-logo">
    </div>

    <div class="container">
        @include('components.sidebar-' . (Auth::user()->role ?? 'student'))

        <div class="main-content">
            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>