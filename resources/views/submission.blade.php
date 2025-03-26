<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Event</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                <a href="home.html">Home</a>
                <a href="pengajuan.html">Pengajuan Event</a>
            </nav>
        </div>
        <div class="search-container">
            <input class="search-box" type="text" placeholder="Cari di Newsri...">
            <i class="fas fa-search"></i>
        </div>
        <i class="fas fa-user user-icon"></i>
    </header>

    <!-- FORM PENGAJUAN EVENT -->
    <div class="form-container">
        <h2>Form Pengajuan Event</h2>
        <form id="eventForm">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>

            <label for="telepon">Nomor Telepon</label>
            <input type="tel" id="telepon" name="telepon" required>

            <label for="namaEvent">Nama Event</label>
            <input type="text" id="namaEvent" name="namaEvent" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea>

            <label for="pamflet">Pamflet Acara</label>
            <input type="file" id="pamflet" name="pamflet" accept="image/*" required>

            <button type="submit">Submit</button>
        </form>
        
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer">
            <img src="{{ asset('images/logo1.jpg') }}" width="100">
        <p>Contact me: +62 800 000 000</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
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