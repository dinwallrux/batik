<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'order_number',
        'user_id',
        'status',
        'grand_total',
        'item_count',
        'is_paid',
        'payment_method',
        'shipping_fullname',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_zipcode',
        'shipping_phone',
        'shipping_email',
        'notes',
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    }

    public function items()
    {
        return $this->belongsToMany(Produk::class, 'order_produk', 'order_id', 'produk_id')->withPivot('quantity', 'price')->withTimestamps();
    }
}
