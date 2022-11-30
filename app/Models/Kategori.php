<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kategoris'; //for relasi
    
    public function buku() //for relasi
    {
        return $this->hasMany(Buku::class); //for relasi
    }
}
