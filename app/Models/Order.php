<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'user_id',
        'payment_method',
        'status',
        'payment_status',
    ];

    public function store ()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest Customer'
        ]);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id', 'id', 'id')
            ->using(OrderItem::class)
            ->as('order_item')
            ->withPivot([
                'product_name', 'price', 'quantity', 'options',
            ]);
    }

    public function addresses()
    {
        return $this->hasMany(OrderAddresses::class);
    }

    public function billingAddress()
    {
        
        return $this->hasOne(OrderAddresses::class, 'order_id', 'id')
        ->where('type', '=', 'billing');

        // return $this->addresses()->where('type', '=', 'billing');
    }

    public function shippingAddress()
    {
        return $this->hasOne(OrderAddresses::class, 'order_id', 'id')
            ->where('type', '=', 'shipping');
    }

    protected static function booted()
    {
        static::creating(function(Order $order){
            // 20250001, 20250002, 20250003
            $order->number = Order::getNextOrderNumber();
        });
    }

    public static function getNextOrderNumber()
    {
        $year =  Carbon::now()->year;
        $number = Order::whereYear('created_at', $year)->max('number');
        if($number) {
            return $number + 1;
        }

        return $year . '0001';
    }
}

