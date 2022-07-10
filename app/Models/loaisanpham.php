<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class loaisanpham extends Model
{
    use HasFactory;
    protected $table = 'categories' ; 
    // public function sanphams(){
    //     return $this->hasMany(sanphams::class);
    // }
}
