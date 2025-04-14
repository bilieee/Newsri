<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d9eaff;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 10px 20px;
        }
        
        .nav-links {
            display: flex;
            gap: 20px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        
        .search-box {
            display: flex;
            align-items: center;
            border: 1px solid gray;
            border-radius: 20px;
            padding: 5px 10px;
        }
        
        .search-box input {
            border: none;
            outline: none;
        }
        
        .profile-icon {
            font-size: 20px;
            cursor: pointer;
        }
        
        .banner {
            margin: 20px auto;
            width: 80%;
        }
        
        .banner img {
            width: 70%;
            max-width: 800px;
            object-fit: cover;
            border-radius: 10px;
        }
        
        .event-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        
        .event-box {
            background: white;
            width: 200px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .event-box img {
            width: 80%;
            border-radius: 10px;
        }
        
        .footer {
            background: white;
            padding: 10px;
            margin-top: 20px;
        }
        
        .footer a {
            margin: 0 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="navbar">       
        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('submission') }}">Pengajuan Event</a>
        </div>
        
        <form action="{{ route('home') }}" method="GET" class="search-box">
            <input type="text" name="search" placeholder="Cari event..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-sm btn-primary ms-2">Cari</button>
        </form>

        @auth
            <div class="profile-icon">
                <img src="{{ asset('images/profile.jpg') }}" alt="Profile" width="50">
            </div>
        @endauth
        
        {{-- Tampilkan tombol LOGIN jika belum login --}}
        @guest
            <div class="login">
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
            </div>
        @endguest
    
        {{-- Tampilkan tombol LOGOUT jika sudah login --}}
        @auth
            <div class="logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
        @endauth
    </div>

    <div class="banner">
       <img src="{{ asset('images/beasiswapertamina.jpg') }}" alt="Beasiswa Pertamina Sobat Bumi 2025">
    </div>

    <div class="event-container">
        @forelse ($events as $event)
            <div class="event-box">
                <img src="{{ asset('storage/' . $event->pamflet) }}" alt="{{ $event->judul }}" width="150">
                <p>{{ $event->judul }}</p>
                <p>{{ $event->deskripsi }}</p>
            </div>
        @empty
            <p>Tidak ada event yang ditemukan.</p>
        @endforelse
    </div>

    <div class="footer">
        <img src="{{ asset('images/logo1.jpg') }}" width="100">
        <p>
            <a href="#"><img src="{{ asset('images/InstaLogo.jpg') }}" alt="Instagram" width="40"></a>
            <a href="#"><img src="{{ asset('images/TwittLogo.jpg') }}" alt="Twitter" width="40"></a>
            <a href="#"><img src="{{ asset('images/FacebLogo.jpg') }}" alt="Facebook" width="40"></a>
        </p>
        <p>Contact me: +62 8 0000 000</p>
    </div>    
</body>
</html>

