<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    
    // WAJIB: Mengatasi error "gurus doesn't exist" dan error Syntax yang mungkin terjadi
    protected $table = 'guru'; 
    
    // WAJIB: Field yang diizinkan untuk diisi (sesuaikan dengan GuruController Anda)
    // Berdasarkan Controller Anda, fieldnya adalah: nama, nip, mapel (bukan nama_guru)
    protected $fillable = ['nama_guru', 'nip', 'mata_pelajaran']; 
}