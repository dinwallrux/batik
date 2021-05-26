<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
        'campuran_1', 'takaran_1', 'campuran_2', 'takaran_2', 'campuran_3', 'takaran_3', 'hasil'
    ];

    public static function campuranObat()
    {
        $lists = [
            'Remasol black b',
            'Remasol Yellow fg',
            'Remasol Turkis',
            'Remasol Orange 3R',
            'Remasol Blue RSP',
            'Remasol Reed RB',
            'Poliatif Blue 2R',
            'Poliatif Blue RSP',
            'Poliatif Violet BNH',
            'Poliatif Violet 5R',
            'Pikmen',
            'Sulfur',
            'Naptol AS',
            'Naptol ASG',
            'Waterglas',
            'Soda kue',
            'Soda as',
            'Caustik',
            'Pikmen'
        ];
        return $lists;
    }

    public function produk()
    {
        return $this->belongsToMany(Produk::class)->withTimestamps();
    }
}
