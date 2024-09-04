<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('user/css/styles.css') }}">
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="{{ asset('user/images/crochet.jpg') }}" alt="Design Image">
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email') <span class="error">{{ $message }}</span> @enderror

            <button type="submit">Send Password Reset Link</button>
        </form>

        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <div class="error">{{ $error }}</div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
