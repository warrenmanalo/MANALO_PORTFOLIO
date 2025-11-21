<h1>Welcome, {{ auth()->user()->name ?? 'User' }}!</h1>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
