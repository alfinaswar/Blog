<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'posts';
    protected $guarded = ['id'];

    public function getPenulis()
    {
        return $this->hasOne(User::class, 'id', 'Penulis');
    }
    public function getkategori()
    {
        return $this->hasOne(Kategori::class, 'KategoriID', 'Kategori');
    }
    public function getKomen()
    {
        return $this->hasMany(Komentar::class, 'IDBerita', 'id');
    }
}
