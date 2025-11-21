@include('components.header')
{{-- <form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <label>Name</label>
        <input type="text" name="name" required>
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Register</button>
</form> --}}
    @if ($errors->any())
        <div style="color: red">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <p>Name </p>
        <input type="text" name="name" required>
        <p>Email </p>
        <input type="email" name="email" required>
        <p>Password</p>
        <input type="password" name="password" required>
        <p>Confirm Password</p>
        <input type="password" name="password_confirmation" required>

        <input type="submit">
    </form>

@include('components.footer')