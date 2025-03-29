<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Dashboard Admin</h2>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.tambah') }}" class="btn btn-primary">Tambah Event</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Nama Event</th>
                <th>Deskripsi</th>
                <th>Pamflet</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->nama }}</td>
                    <td>{{ $event->telepon }}</td>
                    <td>{{ $event->judul }}</td>
                    <td>{{ $event->deskripsi }}</td>
                    <td>
                        @if ($event->pamflet)
                            <img src="{{ asset('storage/' . $event->pamflet) }}" width="100" class="img-thumbnail">
                        @else
                            <span class="text-muted">Tidak ada pamflet</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.event.delete', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>