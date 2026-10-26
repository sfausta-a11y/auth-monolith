<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-sm">
        <h2 class="text-xl font-bold text-center text-gray-800 mb-6">Register Account</h2>

        @if (isset($errors) && $errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs text-gray-700 mb-1">Nama:</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-3 py-2 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
            </div>
            <div>
                <label class="block text-xs text-gray-700 mb-1">Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-3 py-2 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
            </div>
            <div>
                <label class="block text-xs text-gray-700 mb-1">Password:</label>
                <input type="password" name="password" required class="w-full px-3 py-2 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
            </div>
            <div>
                <label class="block text-xs text-gray-700 mb-1">Konfirmasi Password:</label>
                <input type="password" name="password_confirmation" required class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-sm">
            </div>
            <button type="submit" class="w-full bg-sky-500 hover:bg-sky-600 text-white font-medium py-2 rounded-lg transition duration-200 text-sm">Daftar</button>
        </form>

        <p class="text-xs text-center text-gray-500 mt-4">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-gray-500 underline">Login di sini</a>
        </p>
    </div>
</body>
</html>