<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;

    protected $table = 'cart';
    public function sp(){
       return  $this->belongsTo(sanpham::class, 'id_product');
    }
    public function size_p(){
        return  $this->belongsTo(size::class, 'id_size');
     }
}
