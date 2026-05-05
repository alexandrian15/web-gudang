<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    
    <style>
        body { background-color: #2065aa; font-family: 'Segoe UI', sans-serif; }
        .sidebar { min-height: 100vh; background: #212529; color: white; padding-top: 20px; }
        .nav-link { color: #adb5bd; transition: 0.3s; padding: 12px 20px; }
        .nav-link:hover { color: white; background: #343a40; }
        .nav-link.active { color: white; background: #0d6efd; border-radius: 5px; }
        .main-content { 
            padding: 30px;
            background-color: #1a1d20;
            min-height: 100vh;
            color: white;
        }
        .card { border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(124, 80, 80, 0.1); }
        .badge-status { padding: 6px 12px; border-radius: 20px; font-size: 0.85rem; }
        .judul { color: white; }
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
                        <a class="nav-link active" href="/"><i class="fas fa-box me-2"></i> Stok Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barang.masuk') }}"><i class="fas fa-truck-loading me-2"></i> Barang Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barang.keluar') }}"><i class="fas fa-dolly me-2"></i> Barang Keluar</a>
                    </li>
                    <hr class="text-secondary">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('supplier.index') }}"><i class="fas fa-users me-2"></i> Supplier</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-10 ms-sm-auto main-content">
            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-4 border-bottom">
                <h1 class="h2 judul">Manajemen Stok Barang</h1>
                <div>
                    <a href="{{ route('barang.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fas fa-plus me-2"></i>Tambah Barang
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card p-3 border-start border-primary border-4">
                        <small class="text-muted fw-bold text-uppercase">Jenis Barang</small>
                        <h3 class="fw-bold mb-0">{{ count($data_barang) }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 border-start border-success border-4">
                        <small class="text-muted fw-bold text-uppercase">Total Stok</small>
                        <h3 class="fw-bold mb-0">{{ $data_barang->sum('Stok') }}</h3>
                    </div>
                </div>
            </div>

            <div class="card p-4">
                <div class="table-responsive">
                    <table id="tabelBarang" class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Produk</th>
                                <th>Stok</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_barang as $item)
                            <tr>
                                <td class="text-muted">#{{ $item->Id_Barang }}</td>
                                <td class="fw-bold">{{ $item->Nama_Barang }}</td>
                                <td>{{ $item->Stok }} unit</td>
                                <td>
                                    @if($item->Stok > 10)
                                        <span class="badge bg-success badge-status text-white">Tersedia</span>
                                    @else
                                        <span class="badge bg-danger badge-status text-white">Stok Menipis</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="#" class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('barang.destroy', $item->Id_Barang) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus barang ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabelBarang').DataTable({
            "language": {
                "search": "Cari Barang:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data tersedia",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Lanjut",
                    "previous": "Kembali"
                }
            }
        });
    });
</script>
</body>
</html>