<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table ='users';
    protected $primaryKey ='idusers';
    //protected $keyType ='int';
    //public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        //'idusers',
        'hoten',
        'sdt',
        'email',
        'gt',
        'ngaysinh',
        'diachi',
        'password'
    ];
}
