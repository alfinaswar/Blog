<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::check()) {
            if (Auth::user()->hasRole('Admin')) {

                $data = Post::with('getPenulis', 'getKategori')->get();
            } else {
                $data = Post::with('getPenulis', 'getKategori')->where('Penulis', auth()->user()->id)->get();
            }
            // dd($data);
            return view('post.index', compact('data'));
        }
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
        if (Auth::check()) {
            if (Auth::user()->hasRole('Admin')) {
                $data = $request->all();
                if ($request->hasFile('Gambar')) {
                    $file = $request->file('Gambar');
                    $file->storeAs('public/Gambar', $file->getClientOriginalName());
                    $data['Gambar'] = $file->getClientOriginalName();
                }
                $data['Penulis'] = auth()->user()->id;

                Post::create($data);
            } else {
                $data = $request->all();
                if ($request->hasFile('Gambar')) {
                    $file = $request->file('Gambar');
                    $file->storeAs('public/Gambar', $file->getClientOriginalName());
                    $data['Gambar'] = $file->getClientOriginalName();
                }
                $data['Penulis'] = auth()->user()->id;
                $data['GuestPost'] = 'Y';
                $data['Status'] = 'Draft';

                Post::create($data);
            }
            return redirect()->back()->with('success', 'Data Berhasil Disimpan');
        }

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
    public function update(Request $request, $id)
    {
        $request->validate([
            'Judul' => 'required|string|max:255',
            'Kategori' => 'required|exists:kategoris,KategoriID',
            'Status' => 'required|in:Draft,Terbit',
            'Isi' => 'required',
            'Gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $post = Post::findOrFail($id);
            if ($request->hasFile('Gambar')) {
                if ($post->Gambar && Storage::disk('public')->exists('Gambar/' . $post->Gambar)) {
                    Storage::disk('public')->delete('Gambar/' . $post->Gambar);
                }

                // Store new image
                $gambar = $request->file('Gambar');
                $gambarName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->storeAs('public/Gambar', $gambarName);

                $post->Gambar = $gambarName;
            }

            // Update other fields
            $post->Judul = $request->Judul;
            $post->Kategori = $request->Kategori;
            $post->Status = $request->Status;
            $post->Isi = $request->Isi;

            $post->save();

            return redirect()
                ->route('post.index')
                ->with('success', 'Post updated successfully');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error updating post: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $post = Post::findOrFail($id);
            if ($post->Gambar && Storage::disk('public')->exists('Gambar/' . $post->Gambar)) {
                Storage::disk('public')->delete('Gambar/' . $post->Gambar);
            }
            $post->delete();

            return response()->json([
                'success' => true,
                'message' => 'Postingan Berhasil Dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Menghapus Postingan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $item = Post::findOrFail($id);
        $item->Status = $request->Status;
        $item->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateTipe(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($post->Tipe === 'PilihanEditor') {
            $post->Tipe = null;
        } else {
            $post->Tipe = 'PilihanEditor';
        }

        $post->save();

        return response()->json([
            'success' => true,
            'message' => $post->Tipe ? 'Artikel dijadikan Pilihan Editor.' : 'Artikel dihapus dari Pilihan Editor.'
        ]);
    }
}
