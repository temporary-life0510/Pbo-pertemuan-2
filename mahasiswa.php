<?php

namespace App\Models;

/**
 * Class Mahasiswa
 * Memenuhi Tugas 1 & 2 Lab Sheet Praktikum Pertemuan 2
 */
class Mahasiswa
{
    private string $nim;
    private string $nama;
    private string $prodi;
    private float $ipk;

    /**
     * Constructor Mahasiswa
     */
    public function __construct(string $nim, string $nama, string $prodi, float $ipk)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->ipk = $ipk;
    }

    /**
     * Menghitung dan mengembalikan predikat berdasarkan IPK
     */
    public function predikat(): string
    {
        if ($this->ipk >= 3.51) {
            return "Cumlaude";
        } elseif ($this->ipk >= 3.00) {
            return "Sangat Memuaskan";
        } else {
            return "Memuaskan";
        }
    }

    /**
     * Menampilkan informasi lengkap Mahasiswa
     */
    public function info(): string
    {
        return sprintf(
            "NIM: %s | Nama: %s | Prodi: %s | IPK: %.2f | Predikat: %s",
            $this->nim,
            $this->nama,
            $this->prodi,
            $this->ipk,
            $this->predikat()
        );
    }

    // Getter Method
    public function getNim(): string { return $this->nim; }
    public function getNama(): string { return $this->nama; }
    public function getProdi(): string { return $this->prodi; }
    public function getIpk(): float { return $this->ipk; }
}
