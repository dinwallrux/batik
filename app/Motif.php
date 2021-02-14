<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    protected $table = 'motif';

    protected $fillable = [
        'nama', 'gambar'
    ];
}
