<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='product';
    protected $primaryKey ='idproduct';
    protected $keyType ='string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idproduct',
        'ten',
        'mota',
        'gia',
        'img',
        'idcat',
        'gia_km'
    ];
}
