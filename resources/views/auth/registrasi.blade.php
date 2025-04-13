<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
         background: url("{{ asset('images/unsriblur.jpg') }}") no-repeat center center fixed;
         background-size: cover;
         }
     </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center mt-6">
        <img src="{{ asset('images/logo1.jpg') }}" width="400">
    </div>
    <div class="container-fluid" style="background-color: #d9eaff; min-height: 40vh;">
        <div class="text-center mt-6">
    <div class="text-center mt-5">
        <h2>Registrasi Aplikasi</h2>
        <p>Silahkan isi form berikut untuk registrasi</p>

        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-start">
                        <form action="{{ route('registrasi.submit') }}" method="post">
                            @csrf
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control mb-2">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control mb-2">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control mb-2">
                            <button class="btn btn-primary">Submit Registrasi</button>
                            <p>Sudah punya akun?<a href="{{ route('login') }}">Login sekarang</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>