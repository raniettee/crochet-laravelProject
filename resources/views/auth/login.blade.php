<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('user/css/styles.css') }}">
</head>
<body>
<div class="container">
        <div class="image-container">
            <img src="{{ asset('user/images/crochet.jpg') }}" alt="Design Image">
        </div>
     
    <form method="POST" action="{{ route('login') }}">
    <h1>Login</h1>
        @csrf
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email') <span>{{ $message }}</span> @enderror

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password') <span>{{ $message }}</span> @enderror

        <button type="submit">Login</button>
       
         <a href="{{ route('password.request') }}" class="forgot-password">Oublier mot de passe?</a>
    </form>
</body>
</html>
