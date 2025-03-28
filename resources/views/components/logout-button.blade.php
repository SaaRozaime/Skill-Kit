<form method="POST" action="{{ route('logout') }}" class="logout-form">
    @csrf
    <button type="submit" class="logout-button">Logout</button>
</form>

<style>
.logout-button {
    background-color: #ff4444;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    font-family: Lexend, sans-serif;
    font-size: 14px;
    transition: background-color 0.3s;
}

.logout-button:hover {
    background-color: #cc0000;
}

.logout-form {
    display: inline-block;
}
</style> 