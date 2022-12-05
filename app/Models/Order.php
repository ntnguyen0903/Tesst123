<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table ='order';
    protected $primaryKey ='idorder';
    protected $keyType ='string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idorder',
        'idusers',
        'ngaydat',
        'trangthai',
        'ngaygiao',
        'tennguoinhan',
        'sdt',
        'diachinguoinhan',
        'thanhtoan'
    ];
    public function users(){
        return $this->belongsTo(Users::class,'idusers','idusers');
    }
    public function products(){
        return $this->belongsToMany(Product::class,'order_detail','idorder','idproduct');
    }
}
