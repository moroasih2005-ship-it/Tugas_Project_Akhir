<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // WAJIB: Pastikan nama tabel di database Anda adalah 'siswa' (tunggal)
    protected $table = 'siswa'; 

    // WAJIB: Pastikan semua field yang akan Anda isi ada di sini
protected $fillable = ['nama_siswa', 'nis', 'kelas_id']; // Sesuaikan fillable
}