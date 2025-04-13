<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Event</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5F5;
            margin: 0;
            padding: 0;
        }

        /* HEADER */
        header {
            background-color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .nav-left {
            display: flex;
            align-items: center;
        }

        nav a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            margin: 0 15px;
        }

        nav a:hover {
            color: #6CA6FF;
        }

        .search-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-box {
            width: 250px;
            padding: 8px 35px 8px 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            transition: 0.3s;
        }

        .search-box:focus {
            width: 300px;
            border-color: #6CA6FF;
        }

        .search-container i {
            position: absolute;
            right: 10px;
            color: #888;
        }

        .user-icon {
            font-size: 22px;
            cursor: pointer;
            color: black;
            margin-left: 15px;
        }

        /* FORM CONTAINER */
        .form-container {
            width: 50%;
            margin: 50px auto;
            background: #D9E7FF;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input, textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 95%;
        }

        button {
            margin-top: 15px;
            padding: 10px;
            background: #6CA6FF;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #528CFF;
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 20px;
            background: white;
            margin-top: 50px;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        .social-icons a {
            margin: 0 10px;
            text-decoration: none;
            font-weight: bold;
            color: black;
        }

        .social-icons a:hover {
            color: #6CA6FF;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header>
        <div class="nav-left">
            <nav>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('submission') }}">Pengajuan Event</a>
            </nav>
        </div>
        <div class="search-container">
            <input class="search-box" type="text" placeholder="Cari di Newsri...">
            <i class="fas fa-search"></i>
        </div>
        <div class="profile-icon">
            <img src="{{ asset('images/profile.jpg') }}" alt="Profile" width="50">
        </div>
        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </header>

    <!-- FORM PENGAJUAN EVENT -->
    <div class="form-container">
        <h2>Form Pengajuan Event</h2>
        <form id="eventForm">
            <label>Nama:</label>
            <input type="text" id="nama" required>
        
            <label>Nomor Telepon:</label>
            <input type="text" id="telepon" required>
        
            <label>Nama Event:</label>
            <input type="text" id="namaEvent" required>
        
            <label>Deskripsi:</label>
            <textarea id="deskripsi" required></textarea>
        
            <p>Pamflet bisa dikirim setelah melakukan submit ke Whatsapp</p>
        
            <button type="button" onclick="kirimWhatsApp()">Submit ke WhatsApp</button>
        </form>
        
        <script>
            function kirimWhatsApp() {
                let nama = document.getElementById("nama").value;
                let telepon = document.getElementById("telepon").value;
                let namaEvent = document.getElementById("namaEvent").value;
                let deskripsi = document.getElementById("deskripsi").value;
        
                if (!nama || !telepon || !namaEvent || !deskripsi) {
                    alert("Harap isi semua data!");
                    return;
                }
        
                let nomorAdmin = "6283121450782"; // Ganti dengan nomor WhatsApp penerima (tanpa "+")
                let pesan = `Halo Admin, saya ingin mengajukan event:\n\n` +
                            `Nama: ${nama}\n` +
                            `Telepon: ${telepon}\n` +
                            `Nama Event: ${namaEvent}\n` +
                            `Deskripsi: ${deskripsi}`;
                            `Pamflet akan saya kirim setelah ini.`;
        
                let urlWhatsApp = `https://api.whatsapp.com/send?phone=${nomorAdmin}&text=${encodeURIComponent(pesan)}`;
                window.open(urlWhatsApp, "_blank");
            }
        </script>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer">
            <img src="{{ asset('images/logo1.jpg') }}" width="100">
            <p>
                <a href="#"><img src="{{ asset('images/InstaLogo.jpg') }}" alt="Instagram" width="40"></a>
                <a href="#"><img src="{{ asset('images/TwittLogo.jpg') }}" alt="Twitter" width="40"></a>
                <a href="#"><img src="{{ asset('images/FacebLogo.jpg') }}" alt="Facebook" width="40"></a>
            </p>
            <p>Contact me: +62 8 0000 000</p>
        </div>
    </footer>

    <script>
        document.getElementById("eventForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah form melakukan submit default

            let nama = document.getElementById("nama").value;
            let telepon = document.getElementById("telepon").value;
            let namaEvent = document.getElementById("namaEvent").value;
            let deskripsi = document.getElementById("deskripsi").value;
            let pamflet = document.getElementById("pamflet").files[0];

            if (!nama || !telepon || !namaEvent || !deskripsi || !pamflet) {
                alert("Harap isi semua data!");
                return;
            }

            alert("Pengajuan event berhasil dikirim!");
            document.getElementById("eventForm").reset(); // Reset form setelah submit
        });
    </script>

</body>
</html>