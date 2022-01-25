<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','nama_product','deskripsi','harga','nama_kategori','image','created_at','updated_at'
    ];
}
