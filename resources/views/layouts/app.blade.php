<nav>
    <a href="{{ $dashboardUrl() }}" style="margin-right: 20px;">Dashboard</a>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</nav>
