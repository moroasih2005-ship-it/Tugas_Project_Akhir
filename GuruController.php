<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    // READ
    public function index()
    {
        return response()->json(Guru::all());
    }

    // CREATE (Pastikan hanya ada SATU Guru::create)
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required|unique:guru,nip', // <-- Tambah unique validation
            'mata_pelajaran' => 'required'
        ]);

        // 2. Membuat Data (Hanya sekali)
        $guru = Guru::create($request->all());

        // 3. Mengembalikan Respons yang Sukses (201 Created)
        return response()->json([
            'message' => 'Guru berhasil ditambahkan',
            'data' => $guru
        ], 201); // <-- Menggunakan status 201
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->update($request->all());

        return response()->json([
            'message' => 'Guru berhasil diupdate',
            'data' => $guru
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return response()->json([
            'message' => 'Guru berhasil dihapus'
        ]);
    }
}