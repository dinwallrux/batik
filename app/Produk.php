<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'nama', 'harga', 'gambar'
    ];

    // public function produk()
    // {
    //     return $this->belongsToMany(Produk::class, 'obat_produk', 'produk_id', 'obat_id')->withTimestamps();
    // }

    public function obat()
    {
        return $this->belongsToMany(Obat::class)->withTimestamps();
    }
}
