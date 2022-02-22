<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';
    public $timestamps=false;

    protected $fillable=['nama_product', 'deskripsi', 'harga', 'foto_product'];
}
