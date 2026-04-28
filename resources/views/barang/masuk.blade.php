<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barang Masuk - TOKO ALEX JAYA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .sidebar { min-height: 100vh; background: #212529; color: white; padding-top: 20px; }
        .nav-link { color: #adb5bd; transition: 0.3s; padding: 12px 20px; }
        .nav-link:hover { color: white; background: #343a40; }
        .nav-link.active { color: white; background: #0d6efd; border-radius: 5px; }
        .main-content { 
            padding: 30px;
            background-color: #1a1d20;
            min: height 100vh;
            color:white; }
        .card { border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="position-sticky px-3">
                <h4 class="text-center mb-4"><i class="fas fa-warehouse me-2"></i>TOKO ALEX JAYA</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fas fa-box me-2"></i> Stok Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/barang-masuk"><i class="fas fa-truck-loading me-2"></i> Barang Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-dolly me-2"></i> Barang Keluar</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto main-content">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-4 border-bottom">
                <h1 class="h2">Riwayat Barang Masuk</h1>
                <button class="btn btn-success shadow-sm">
                    <i class="fas fa-plus-circle me-2"></i>Input Barang Masuk
                </button>
            </div>

            <div class="card p-4">
                <div class="table-responsive">
                    <table id="tabelMasuk" class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayat as $row)
                            <tr>
                                <td>{{ date('d M Y', strtotime($row->Tanggal)) }}</td>
                                <td class="fw-bold">{{ $row->Nama_Barang }}</td>
                                <td><span class="badge bg-info text-dark">+ {{ $row->Jumblah }}</span></td>
                                <td>
                                    <button class="btn btn-sm btn-light"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabelMasuk').DataTable();
    });
</script>
</body>
</html>