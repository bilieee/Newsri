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