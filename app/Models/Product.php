<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_color_size_category');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_color_size_category');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_color_size_category');
    }

}
