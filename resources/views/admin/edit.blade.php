<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Edit Event</h2>
    <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ $event->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor Telepon</label>
            <input type="text" name="telepon" value="{{ $event->telepon }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Event</label>
            <input type="text" name="judul" value="{{ $event->judul }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $event->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Pamflet</label>
            <input type="file" name="pamflet" class="form-control">
            @if($event->pamflet)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $event->pamflet) }}" width="150" class="img-thumbnail">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Event</button>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>