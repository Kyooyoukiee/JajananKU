<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jajan extends Model
{
    protected $fillable = [
        'kategori_id',
        'nama_jajanan',
        'harga_jajanan'
    ];

    public function kategoris(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
