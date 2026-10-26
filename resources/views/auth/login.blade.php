<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Modular Monolith</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background: #f4f4f9; }
        .login-card { background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 300px; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: .5rem; }
        input[type="email"], input[type="password"] { width: 100%; padding: .5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: .7rem; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .error { color: red; font-size: 0.875rem; margin-bottom: 1rem; }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Form Login</h2>

    @if($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>