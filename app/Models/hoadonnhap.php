<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonnhap extends Model
{
    use HasFactory;
    protected $table = 'import_bills';
    public function nhacungcap(){
        return $this->belongsTo(
            nhacungcap::class,'id_supplier');
    }
    public function nhanvien(){
        return $this->belongsTo(
            nhanvien::class,'id_staff');
    }
}
