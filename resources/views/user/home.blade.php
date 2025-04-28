<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div class="navbar">       
        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('submission') }}">Pengajuan Event</a>
        </div>
        <div class="navconright">
        @auth
            <div class="profile-icon">
                <img src="{{ asset('images/profile.jpg') }}" alt="Profile" width="50">
            </div>
        @endauth
        
        @guest
            <div class="login">
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
            </div>
        @endguest

        @auth
            <div class="logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
        @endauth
        </div>
    </div>

    <div class="search-wrapper">
        <form action="{{ route('home') }}" method="GET" class="search-box">
            <input type="text" name="search" placeholder="Cari event..." value="{{ request('search') }}">
        </form>
            <button type="submit" class="btn-search btn btn-sm btn-primary ms-2">Cari</button>
    </div>

    <!-- Ukuran gambar untuk carousel enaknya 2560 x 1440-->
    <div class="main-content">
        <div class="banner">
            <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" style="height: 600px;"> 
                    <div class="carousel-item active">
                        <img src="{{ asset('images/beasiswapertamina.jpg') }}" class="d-block w-100"
                            style="height: 100%; object-fit: contain; background-color: #000;" alt="Gambar 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/KELAS2.jpg') }}" class="d-block w-100"
                            style="height: 100%; object-fit: contain; background-color: #000;" alt="Gambar 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/maba.jpg') }}" class="d-block w-100"
                            style="height: 100%; object-fit: contain; background-color: #000;" alt="Gambar 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>

        <div class="event-container">
            @forelse ($events as $event)
                <div class="event-box">
                    <img src="{{ asset(  $event->pamflet) }}" alt="{{ $event->judul }}" class="event-image">
                    <p>
                        <a href="{{ $event->link }}" target="_blank" class="event-title">
                            {{ $event->judul }}
                        </a>
                    </p>
                    <p>{{ $event->nama }}</p>
                    <p>{{ $event->deskripsi }}</p>
                    <p>{{ $event->telepon }}</p>
                </div>
            @empty
                <div class="empty-message">
                    Tidak ada event yang ditemukan.
                </div>
            @endforelse
        </div>
        
    </div>

    <div class="footer">
        <div>
            <p>Contact me: +62 8 0000 000</p>
        </div>
        <div>
            <img src="{{ asset('images/logo1.jpg') }}" width="100">
        </div>
        <div>
            <p>
                <a href="#"><img src="{{ asset('images/InstaLogo.jpg') }}" alt="Instagram" width="40"></a>
                <a href="#"><img src="{{ asset('images/TwittLogo.jpg') }}" alt="Twitter" width="40"></a>
                <a href="#"><img src="{{ asset('images/FacebLogo.jpg') }}" alt="Facebook" width="40"></a>
            </p>
        </div>
    </div>   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
