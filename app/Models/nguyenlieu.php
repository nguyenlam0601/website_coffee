<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguyenlieu extends Model
{
    use HasFactory;
    protected $table = 'materials';
    public function nhacungcap(){
        return $this->belongsTo(
            nhacungcap::class,'id_supplier');
    }
}
