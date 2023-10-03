<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'userId',
        'mobile',
        'paidBy',
        'subTotal',
        'method',
        'process'
    ];

    public function cartItems(){
        return $this->belongsToMany(CartItem::class, 'order_cart_items');
    }

    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }
}
