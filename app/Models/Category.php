<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //
    protected $table ='category';
    protected $primaryKey ='idcat';
    protected $keyType ='string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idcat',
        'name'
    ];
    public function product(){
        return $this->hasMany(Product::class,'idcat','idcat');
    }
}
