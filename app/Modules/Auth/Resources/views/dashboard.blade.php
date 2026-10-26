<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto py-10 px-4">
        <!-- Header & Card Utama -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
            <div class="flex justify-between items-center pb-4 border-b">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Dashboard User</h1>
                    <p class="text-gray-600 mt-1">
                        Selamat datang, <span class="font-semibold text-gray-900">{{ auth()->user()->name }}</span>! 
                        (Role: <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded font-medium">{{ auth()->user()->role }}</span>)
                    </p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium px-4 py-2 rounded-lg transition duration-200">
                        Logout
                    </button>
                </form>
            </div>

            <!-- Form Update Profil -->
            <div class="mt-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Update Profil</h2>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" class="space-y-4 max-w-md">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama:</label>
                        <input type="text" name="name" value="{{ auth()->user()->name }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg transition duration-200">
                        Simpan Profil
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>