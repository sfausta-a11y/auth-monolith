<!DOCTYPE html>
<html>
<head><title>Dashboard User</title></head>
<body style="font-family: sans-serif; padding: 20px;">
    <h1>Dashboard User</h1>
    <p>Selamat datang, <b>{{ Auth::user()->name }}</b>! (Role: {{ Auth::user()->role }})</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <hr>

    <h3>Update Profil</h3>
    @if(session('success')) <p style="color:green;">{{ session('success') }}</p> @endif
    <form action="{{ route('profile.update') }}" method="POST" style="max-width: 300px;">
        @csrf
        @method('PUT')
        <p><label>Nama:</label><br><input type="text" name="name" value="{{ Auth::user()->name }}" style="width:100%" required></p>
        <p><label>Email:</label><br><input type="email" name="email" value="{{ Auth::user()->email }}" style="width:100%" required></p>
        <button type="submit">Simpan Profil</button>
    </form>
</body>
</html>