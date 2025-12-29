<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    // READ
    public function index()
    {
        return response()->json(Kelas::all());
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ]);

        $kelas = Kelas::create($request->all());

        return response()->json([
            'message' => 'Kelas berhasil ditambahkan',
            'data' => $kelas
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return response()->json([
            'message' => 'Kelas berhasil diupdate',
            'data' => $kelas
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return response()->json([
            'message' => 'Kelas berhasil dihapus'
        ]);
    }
}
