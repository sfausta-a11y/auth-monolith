<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body style="font-family: sans-serif; padding: 20px; max-width: 400px;">
    <h2>Register Account</h2>
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <p><label>Nama:</label><br><input type="text" name="name" style="width:100%" required></p>
        <p><label>Email:</label><br><input type="email" name="email" style="width:100%" required></p>
        <p><label>Password:</label><br><input type="password" name="password" style="width:100%" required></p>
        <p><label>Konfirmasi Password:</label><br><input type="password" name="password_confirmation" style="width:100%" required></p>
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
</body>
</html>