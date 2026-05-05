<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Supplier - TOKO ALEX JAYA</title>
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
            color:white;}
        .card { border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .contact-icon { width: 35px; height: 35px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; background: #e7f1ff; color: #0d6efd; text-decoration: none; transition: 0.3s; }
        .contact-icon:hover { background: #0d6efd; color: white; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="position-sticky px-3">
                <h4 class="text-center mb-4"><i class="fas fa-warehouse me-2"></i>TOKO ALEX JAYA</h4>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-box me-2"></i> Stok Barang</a></li>
                    <li class="nav-item"><a class="nav-link" href="/barang-masuk"><i class="fas fa-truck-loading me-2"></i> Barang Masuk</a></li>
                    <li class="nav-item"><a class="nav-link" href="/barang-keluar"><i class="fas fa-dolly me-2"></i> Barang Keluar</a></li>
                    <hr class="text-secondary">
                    <li class="nav-item"><a class="nav-link active" href="/supplier"><i class="fas fa-users me-2"></i> Supplier</a></li>
                </ul>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto main-content">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-4 border-bottom">
                <h1 class="h2">Database Supplier</h1>
                <button class="btn btn-primary shadow-sm"><i class="fas fa-user-plus me-2"></i>Tambah Supplier</button>
            </div>

            <div class="card p-4">
                <div class="table-responsive">
                    <table id="tabelSupplier" class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <th>Kontak</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data_supplier as $sup)
                            <tr>
                                <td class="fw-bold text-primary">{{ $sup->Nama_Suplier }}</td>
                                <td>{{ $sup->alamat }}</td>
                                <td>
                                    <span class="text-muted"><i class="fas fa-phone me-1"></i> {{ $sup->No_telfon }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="https://wa.me/{{ $sup->No_telfon }}" target="_blank" class="contact-icon me-2" title="Hubungi via WA">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data supplier.</td>
                            </tr>
                            @endforelse
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
        $('#tabelSupplier').DataTable();
    });
</script>
</body>
</html>