<?php

namespace App\Models;

/**
 * Class Produk
 * Memenuhi Tugas 4 Lab Sheet Praktikum Pertemuan 2
 */
class Produk
{
    private string $nama;
    private float $harga;
    private int $stok;

    /**
     * Constructor Produk
     */
    public function __construct(string $nama, float $harga, int $stok)
    {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    /**
     * Menghitung total nilai inventaris produk (harga * stok)
     */
    public function totalNilai(): float
    {
        return $this->harga * $this->stok;
    }

    // Getter Method
    public function getNama(): string { return $this->nama; }
    public function getHarga(): float { return $this->harga; }
    public function getStok(): int { return $this->stok; }
}
