<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable= ['photo', 'judul_buku', 'nomor_buku', 'stok_buku','sinopsis', 'pengarang', 'penerbit', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
