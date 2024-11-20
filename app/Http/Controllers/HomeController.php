<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $Editor = Post::where('Tipe', 'PilihanEditor')->get();
        $TotalPost = Post::count();
        $TotalUser = User::count();
        $TotalKategori = Kategori::count();
        $PostFromUser = Post::where('GuestPost', 'Y')->count();
        $Recent = Post::get()->take(10);
        return view('home', compact(
            'TotalPost',
            'TotalUser',
            'Recent', 'PostFromUser', 'TotalKategori', 'Editor'
        ));
    }
}
