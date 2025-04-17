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
    </div>

    <div class="search-wrapper">
        <form action="{{ route('home') }}" method="GET" class="search-box">
            <input type="text" name="search" placeholder="Cari event..." value="{{ request('search') }}">
        </form>
            <button type="submit" class="btn-search btn btn-sm btn-primary ms-2">Cari</button>
    </div>

    <div class="banner">
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/beasiswapertamina.jpg') }}" class="d-block w-100" alt="Gambar 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/multifest.jpg') }}" class="d-block w-100" alt="Gambar 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/mbaktutik.jpg') }}" class="d-block w-100" alt="Gambar 3">
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
    
    
        <!-- Tombol navigasi -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
    </div>
    
    <div class="event-container">
        @forelse ($events as $event)
            <div class="event-box">
                <img src="{{ asset('storage/' . $event->pamflet) }}" alt="{{ $event->judul }}" width="150">
                <p>
                    <a href="https://www.youtube.com" target="_blank" style="text-decoration: none; font-weight: bold; color: #007bff;">
                        {{ $event->judul }}
                    </a>
                </p>                
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>

