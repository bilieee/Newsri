<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Event</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/submission.css') }}">

</head>
<body>
    <div class="page-wrapper">

        <div class="navbar">
            <nav class= "homesub">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('submission') }}">Pengajuan Event</a>
            </nav>
            <div class="navconright">
            <div class="profile-icon">
                <img src="{{ asset('images/profile.jpg') }}" alt="Profile" width="50">
            </div>
            <div class="logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
            </div>
        </div>

    <!-- FORM PENGAJUAN EVENT -->
    <div class="form-container">
        <h2>Form Pengajuan Event</h2>
        <form action="{{ route('submission.submit') }}" method="POST">
            @csrf
            <label>Nama:</label>
            <input type="text" name="nama" required>
        
            <label>Nomor Telepon:</label>
            <input type="text" name="telepon" required>
        
            <label>Nama Event:</label>
            <input type="text" name="namaEvent" required>
        
            <label>Deskripsi:</label>
            <textarea name="deskripsi" required></textarea>  

            <label>Link:</label>
            <input type="text" name="link" required>
            
            <label>Pamflet bisa dikirim setelah melakukan submit</label>
            <br>
            <button type="submit" class="btn btn-primary w-100">Submit ke WhatsApp</button>
        </form>
        
    </div>
</div>

    <!-- FOOTER -->
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