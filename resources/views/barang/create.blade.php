<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow col-md-6 mx-auto">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Form Tambah Barang</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('barang.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" name="Nama_Barang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Stok</label>
                        <input type="number" name="Stok" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="/barang" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan Barang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>