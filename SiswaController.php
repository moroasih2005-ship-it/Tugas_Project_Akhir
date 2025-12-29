<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    // READ ALL (GET /api/siswa)
    public function index()
    {
        return response()->json(Siswa::all());
    }

    // CREATE/STORE (POST /api/siswa)
    public function store(Request $request) 
    {
        // PENTING: Validasi data
        $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required|unique:siswa,nis', // Tambahkan unique check
            'kelas_id' => 'required|integer'
        ]);

        // Penyimpanan Data
        $siswa = Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'nis' => $request->nis,
            'kelas_id' => $request->kelas_id
        ]);

        return response()->json([
            'message' => 'Siswa berhasil ditambahkan',
            'data' => $siswa
        ], 201); // 201 Created
    }

    // UPDATE (PUT/PATCH /api/siswa/{id})
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->update($request->all());

        return response()->json([
            'message' => 'Siswa berhasil diupdate',
            'data' => $siswa
        ]);
    }

    // DELETE (DELETE /api/siswa/{id})
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return response()->json([
            'message' => 'Siswa berhasil dihapus'
        ]);
    }
}