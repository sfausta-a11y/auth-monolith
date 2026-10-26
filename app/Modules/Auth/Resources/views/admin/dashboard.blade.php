<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <h1>Dashboard Admin (Role Management)</h1>
    <p>Selamat datang Admin, <b>{{ Auth::user()->name }}</b>!</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <hr>

    <h3>Daftar Pengguna Aplikasi</h3>
    @if(session('success')) <p style="color:green;">{{ session('success') }}</p> @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role Saat Ini</th>
                <th>Ubah Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><b>{{ $user->role }}</b></td>
                <td>
                    <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <select name="role">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <button type="submit">Ubah</button>
                    </form>
                </td>
                <td>
                    @if($user->id !== Auth::id())
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color:red;">Hapus</button>
                    </form>
                    @else
                    <i>(Akun Anda)</i>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>