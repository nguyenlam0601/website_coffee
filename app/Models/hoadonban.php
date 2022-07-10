<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonban extends Model
{
    use HasFactory;
    protected $table = 'bills';
    public function khachhang(){
        return $this->belongsTo(
            khachhang::class,'id_customer');
    }
    // public function cthd(){
    //     return $this->belongsTo(
    //         cthoadonban::class,'id_bill');
    // }
    public function cthd(){
        return $this->hasMany(cthoadonban::class, 'id_bill', 'id');
    }
}
