<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userId',
        'productId',
        'sizeId',
        'colorId',
        'quantity',
        'total',
        'process'
    ];
    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'productId','id');
    }
    public function size(){
        return $this->belongsTo(Size::class,'sizeId','id');
    }
    public function color(){
        return $this->belongsTo(Color::class,'colorId','id');
    }

}
