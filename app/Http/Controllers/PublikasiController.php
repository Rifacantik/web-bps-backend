<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    //mengambil data publikasi
    public function index()
    {
        return Publikasi::all();
    }

    //menyimpan data publikasi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'description' => 'nullable|string',
            'coverUrl' => 'nullable|url',
        ]);

        $publikasi = Publikasi::create($validated);
        return response()->json($publikasi, 201);
    }

    //menampilkan detail publikasi berdasarkan id
    public function show($id)
    {
        $publikasi = Publikasi::find($id); //mencari
        return response()->json($publikasi); 
    }

    //update data publikasi berdasarkan id
    public function update(Request $request, $id)
    {
        $publikasi = Publikasi::findOrFail($id); //mencari
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'releaseDate' => 'required|date',
            'description' => 'nullable|string',
            'coverUrl' => 'nullable|url',
        ]);
    
        $publikasi->update($validated);
        
        return response()->json([
        'message' => "Publikasi berhasil diperbarui",
        'data' => $publikasi // Kirim data yang sudah diupdate
    ]);
    }

    //menghapus data publikasi berdasarkan id
    public function destroy($id)
    {
        $publikasi = Publikasi::findOrFail($id); //mencari
        $publikasi->delete(); //hapus data publikasi
        return response()->json(['message'=> "Publikasi berhasil dihapus"]);
    }
}