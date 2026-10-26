<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body style="font-family: sans-serif; padding: 20px; max-width: 400px;">
    <h2>Login System</h2>
    @if(session('success')) <p style="color:green;">{{ session('success') }}</p> @endif
    @if($errors->any()) <p style="color:red;">{{ $errors->first() }}</p> @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <p><label>Email:</label><br><input type="email" name="email" style="width:100%" required></p>
        <p><label>Password:</label><br><input type="password" name="password" style="width:100%" required></p>
        <p><input type="checkbox" name="remember" id="remember"> <label for="remember">Remember Me</label></p>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="{{ route('register') }}">Register di sini</a></p>
</body>
</html>