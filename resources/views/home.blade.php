<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('user/css/styless.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="/" class="logo">MyApp</a>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </nav>

    <main class="container">
        <div class="card-grid">
            @foreach ($items as $item)
                <div class="card">
                    <img src="{{ asset('images/' . $item->image_url) }}" alt="{{ $item->title }}">
                    <div class="card-content">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>
                        <a href="#" class="btn">See Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
