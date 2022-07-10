<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cthoadonban extends Model
{
    use HasFactory;
    protected $table = 'bill_detail';
    public function  sanpham(){
        return $this->belongsTo(
            sanpham::class,'id_product','id');
    }
    public function hoadonban() {
        return $this->belongsTo(hoadonban::class, 'id_bill', 'id');
    }
}
