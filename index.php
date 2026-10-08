<?php
require_once 'mahasiswa.php';
require_once 'produk.php';

// --- DATA SPREADSHEET: 10 OBJEK MAHASISWA ---
$daftar_mahasiswa = [
    new Mahasiswa("2424101225", "Rahmawati", "Pendidikan Teknologi Informasi", 3.12),
    new Mahasiswa("2424101101", "Anissa Ahmad Maulana", "Pendidikan Teknologi Informasi", 3.45),
    new Mahasiswa("2424101161", "M. Fariana", "Pendidikan Teknologi Informasi", 3.71),
    new Mahasiswa("2424101004", "Budi Santoso", "Pendidikan Teknologi Informasi", 2.90),
    new Mahasiswa("2424101005", "Citra Lestari", "Pendidikan Teknologi Informasi", 3.65),
    new Mahasiswa("2424101006", "Dedi Kurniawan", "Pendidikan Teknologi Informasi", 3.20),
    new Mahasiswa("2424101007", "Eka Wahyuni", "Pendidikan Teknologi Informasi", 3.85),
    new Mahasiswa("2424101008", "Fahmi Idrus", "Pendidikan Teknologi Informasi", 3.10),
    new Mahasiswa("2424101009", "Gita Permata", "Pendidikan Teknologi Informasi", 3.55),
    new Mahasiswa("2424101010", "Hendra Wijaya", "Pendidikan Teknologi Informasi", 3.33)
];

// --- DATA SPREADSHEET: 10 OBJEK PRODUK ---
$daftar_produk = [
    new Produk("Laptop ASUS Expertbook", 11500000, 1),
    new Produk("Mouse Wireless Logi", 350000, 20),
    new Produk("Mechanical Keyboard RGB", 550000, 5),
    new Produk("Monitor LED 24 Inch", 1850000, 3),
    new Produk("Harddisk Eksternal 1TB", 850000, 8),
    new Produk("SSD NVMe 512GB", 650000, 12),
    new Produk("RAM DDR4 16GB", 750000, 15),
    new Produk("Headset Gaming", 450000, 6),
    new Produk("Webcam Full HD", 380000, 10),
    new Produk("Router Wi-Fi Dual Band", 520000, 4)
];

$grand_total_stok = 0;
foreach ($daftar_produk as $prd) {
    $grand_total_stok += $prd->totalNilai();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Sheet Pertemuan 2 - PBO Tosca</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
    <style>
        body { background-color: #f0f5f5; font-family: 'Segoe UI', sans-serif; }
        .dashboard-header { background: linear-gradient(135deg, #008080 0%, #20b2aa 100%); color: white; padding: 25px; border-radius: 12px; margin-bottom: 30px; }
        .bg-tosca { background-color: #008080 !important; color: white !important; }
        .bg-tosca-light { background-color: #e0f2f1 !important; color: #004d40 !important; }
        .table-responsive { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,128,128,0.08); }
        .table-tosca-header { background-color: #008080; color: white; }
        .badge-tosca { background-color: #20b2aa; color: white; }
    </style>
</head>
<body>

<div class="container my-5">
    <!-- Header Dashboard -->
    <div class="dashboard-header text-center shadow">
        <h1 class="fw-bold m-0">📊 DASHBOARD PRAKTIKUM PBO</h1>
        <p class="text-white-50 m-0 mt-1">Implementasi Class & Object dengan Tema Biru Tosca</p>
    </div>

    <!-- Ringkasan Nilai Stok -->
    <div class="card bg-tosca p-4 mb-4 shadow-sm border-0">
        <h5 class="text-white-50">Total Kumulatif Nilai Stok Seluruh Inventaris:</h5>
        <h2 class="fw-bold m-0 text-warning">Rp <?= number_format($grand_total_stok, 0, ',', '.'); ?></h2>
    </div>

    <!-- TABEL DATA MAHASISWA -->
    <div class="mb-5">
        <h4 class="fw-bold text-dark mb-3" style="color: #008080 !important;">🎓 DAFTAR MAHASISWA OBJECT</h4>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr class="table-tosca-header">
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Program Studi</th>
                        <th class="text-center">IPK</th>
                        <th>Predikat Kelulusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftar_mahasiswa as $mhs): ?>
                    <tr>
                        <td><?= $mhs->nim; ?></td>
                        <td class="fw-semibold"><?= $mhs->nama; ?></td>
                        <td><?= $mhs->prodi; ?></td>
                        <td class="text-center"><span class="badge bg-tosca-light fw-bold"><?= number_format($mhs->ipk, 2); ?></span></td>
                        <td>
                            <?php 
                            $predikat = $mhs->predikat();
                            $badge_color = ($predikat == 'Cumlaude') ? 'bg-warning text-dark' : (($predikat == 'Sangat Memuaskan') ? 'bg-success' : 'bg-secondary');
                            ?>
                            <span class="badge <?= $badge_color; ?>"><?= $predikat; ?></span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- TABEL DATA PRODUK -->
    <div>
        <h4 class="fw-bold text-dark mb-3" style="color: #008080 !important;">📦 INVENTARIS PRODUK OBJECT</h4>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr class="table-tosca-header">
                        <th>Nama Produk</th>
                        <th class="text-end">Harga Satuan</th>
                        <th class="text-center">Stok</th>
                        <th class="text-end">Total Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($daftar_produk as $prd): ?>
                    <tr>
                        <td class="fw-semibold"><?= $prd->nama; ?></td>
                        <td class="text-end">Rp <?= number_format($prd->harga, 0, ',', '.'); ?></td>
                        <td class="text-center"><span class="badge bg-secondary"><?= $prd->stok; ?> Pcs</span></td>
                        <td class="text-end fw-bold" style="color: #008080;">Rp <?= number_format($prd->totalNilai(), 0, ',', '.'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://jsdelivr.net"></script>
</body>
</html>
