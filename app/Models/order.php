<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'product_id',
        'user_id',
        'total',
    ];
    protected $casts = [
        'create_at' => 'timestamp',
    ];
    public function product()
    {
        return $this->hasOne(product::class, 'id', 'product_id');
    }
    public function user()
    {
        return $this->hasOne(user::class, 'id', 'user_id');
    }


}
