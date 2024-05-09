<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_product',  'harga', 'deskripsi', 'rating', 'foto','foto1','foto2','foto3','foto4', 'detail_fotos',
    ];
}