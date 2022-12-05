<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    
    protected $table = 'orderdetail';
    protected $primaryKey =['idproduct', 'idorder'];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable =['idorder','idproduct', 'soluong','gia'];
}
