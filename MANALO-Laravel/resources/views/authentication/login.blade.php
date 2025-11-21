@include('components.header')
<!-- <form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit">Login</button>
</form> -->

    @if ($errors->any())
    <div style="color: red">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <p>Email </p>
        <input type="email" name="email" required>
        <p>Password</p>
        <input type="password" name="password" required>


        <input type="submit">
    </form>


@include('components.footer')