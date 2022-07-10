<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table = 'product';
    public function loaisanpham(){
        return $this->belongsTo(loaisanpham::class,'id_category');
    }
    public function size(){
        return $this->hasMany(size::class,'id_product');
    }
    public function cthds(){
        return $this->hasMany(cthoadonban::class, 'id_product', 'id');
    }
   
}
