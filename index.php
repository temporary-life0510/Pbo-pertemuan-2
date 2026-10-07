<?php

require_once 'Mahasiswa.php';
require_once 'Produk.php';

use App\Models\Mahasiswa;
use App\Models\Produk;

// Tugas 3: Buat 3 Object Mahasiswa & Tampilkan Info & Predikatnya
$mhs1 = new Mahasiswa("24.24.032255", "Rahmansyah", "Pendidikan Teknologi Informasi", 3.15);
$mhs2 = new Mahasiswa("24.24.031635", "M. Fitriannur Akbar", "Pendidikan Teknologi Informasi", 3.23);
$mhs3 = new Mahasiswa("24.24.031001", "Ahmad Maulana", "Pendidikan Teknologi Informasi", 3.75);

$daftarMahasiswa = [$mhs1, $mhs2, $mhs3];

echo "=== DAFTAR MAHASISWA ===\n";
foreach ($daftarMahasiswa as $index => $mhs) {
    echo ($index + 1) . ". " . $mhs->info() . "\n";
}

// Tugas 4: Buat Object Produk & Panggil totalNilai()
$p1 = new Produk("Laptop ASUS ExpertBook", 12500000, 8);
$p2 = new Produk("Mouse Wireless Logi", 350000, 20);
$p3 = new Produk("Mechanical Keyboard RGB", 850000, 25);

$daftarProduk = [$p1, $p2, $p3];

echo "\n=== DAFTAR PRODUK & TOTAL NILAI ===\n";
foreach ($daftarProduk as $index => $produk) {
    echo sprintf(
        "%d. %s - Harga: Rp %s | Stok: %d | Total Nilai: Rp %s\n",
        ($index + 1),
        $produk->getNama(),
        number_format($produk->getHarga(), 0, ',', '.'),
        $produk->getStok(),
        number_format($produk->totalNilai(), 0, ',', '.')
    );
}
