<?php

namespace App\Http\Controllers;

use App\Models\Kaegori;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KaegoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'))->with('i');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required',
        ]);
        $namaArray = explode(' ', $request->Nama);
        $namaDenganStrip = implode('-', $namaArray);
        Kategori::create([
            'KategoriID' => $namaDenganStrip,
            'Nama' => $request->Nama,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dibuat.');
    }

    public function edit($id)
    {
        $Kategori = Kategori::find($id);
        return view('kategori.edit', compact('Kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required',
        ]);
        $namaArray = explode(' ', $request->Nama);
        $namaDenganStrip = implode('-', $namaArray);
        $Kategori = Kategori::find($id);
        $Kategori->update([
            'KategoriID' => $namaDenganStrip,
            'Nama' => $request->Nama,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy($id)
    {
        $Kategori = Kategori::find($id);
        $Kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
