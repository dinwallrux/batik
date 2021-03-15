<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
