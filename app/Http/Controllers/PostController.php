<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::with('getPenulis', 'getKategori')->get();
        return view('post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('post.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('Gambar')) {
            $file = $request->file('Gambar');
            $file->storeAs('public/Gambar', $file->getClientOriginalName());
            $data['Gambar'] = $file->getClientOriginalName();
        }
        $data['Penulis'] = auth()->user()->id;

        Post::create($data);
        return redirect()->route('post.index')->with('success', 'Postingan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $kategori = Kategori::all();
        return view('post.edit', compact('post', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
