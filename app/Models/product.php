<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'img',
        'price',
        'description',
        'category_id',
        'brand_id'
    ];

    protected $hidden = [ 'brand_id', 'category_id'];
    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];
    use HasFactory;
    public function category()
    {
        return $this->hasOne(category::class, 'id', 'category_id');
    }

    public function brand()
    {
        return $this->hasOne(brand::class, 'id', 'brand_id');
    }
}
