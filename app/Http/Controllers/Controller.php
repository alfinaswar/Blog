<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function Beranda()
    {
        $kategori = Kategori::get();
        $latestartikel = Post::with('getPenulis', 'getKategori')->latest()->first();
        $recent = Post::with('getPenulis', 'getKategori')->latest()->get()->take(5);
        $random = Post::with('getPenulis', 'getKategori')->inRandomOrder()->take(3)->get();
        $editor = Post::with('getPenulis', 'getKategori')->where('Tipe', 'PilihanEditor')->latest()->get()->take(6);
        return view('welcome', compact('kategori', 'latestartikel', 'recent', 'random', 'editor'));
    }

    public function BeritaKategori($Kategori)
    {
        $data = Post::where('KategoriID', $Kategori)->get();
        return view('BeritaKategori', compact('data'));
    }
}
