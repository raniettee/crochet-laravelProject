<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('user/css/styles.css') }}">
</head>
<body>
<div class="container">
        <div class="image-container">
            <img src="{{ asset('user/images/crochet.jpg') }}" alt="Design Image">
        </div>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <h1>Register</h1>

       

        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
        @error('nom') <span class="error">{{ $message }}</span> @enderror

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email') <span class="error">{{ $message }}</span> @enderror

        <label for="adresse">Adresse</label>
        <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
        @error('adresse') <span class="error">{{ $message }}</span> @enderror

        <label for="role">Role</label>
        <input type="text" id="role" name="role" value="{{ old('role') }}" required>
        @error('role') <span class="error">{{ $message }}</span> @enderror

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password') <span class="error">{{ $message }}</span> @enderror

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <input type="submit" value="Register">
    </form>

   
</body>
</html>
