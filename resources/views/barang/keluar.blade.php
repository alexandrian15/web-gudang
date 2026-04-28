<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barang Keluar - TOKO ALEX JAYA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .sidebar { min-height: 100vh; background: #212529; color: white; padding-top: 20px; }
        .nav-link { color: #adb5bd; transition: 0.3s; padding: 12px 20px; }
        .nav-link:hover { color: white; background: #343a40; }
        .nav-link.active { color: white; background: #0d6efd; border-radius: 5px; }
        .main-content { padding: 30px; background-color: #f0f2f5; min-height: 100vh; }
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
                    <li class="nav-item"><a class="nav-link" href="/"><i class="fas fa-box me-2"></i> Stok Barang</a></li>
                    <li class="nav-item"><a class="nav-link" href="/barang-masuk"><i class="fas fa-truck-loading me-2"></i> Barang Masuk</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/barang-keluar"><i class="fas fa-dolly me-2"></i> Barang Keluar</a></li>
                    <hr class="text-secondary">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-users me-2"></i> Supplier</a></li>
                </ul>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto main-content">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-4 border-bottom">
                <h1 class="h2">Riwayat Barang Keluar</h1>
                <div>
                    <button class="btn btn-outline-danger me-2"><i class="fas fa-file-pdf me-2"></i>Cetak PDF</button>
                    <button class="btn btn-warning shadow-sm"><i class="fas fa-minus-circle me-2"></i>Input Barang Keluar</button>
                </div>
            </div>

            <div class="card p-4">
                <div class="table-responsive">
                    <table id="tabelKeluar" class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Keluar</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayatKeluar as $row)
                            <tr>
                                <td>{{ date('d M Y', strtotime($row->Tanggal)) }}</td>
                                <td class="fw-bold">{{ $row->Nama_Barang }}</td>
                                <td><span class="badge bg-danger bg-opacity-10 text-danger" style="font-size: 1rem;">- {{ $row->Jumblah }}</span></td>
                                <td class="text-center"><span class="badge bg-secondary">Dikirim</span></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data barang keluar.</td>
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
        $('#tabelKeluar').DataTable({
            "order": [[ 0, "desc" ]] // Urutkan berdasarkan tanggal terbaru
        });
    });
</script>
</body>
</html>