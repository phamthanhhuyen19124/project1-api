<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newspaper extends Model
{
    use HasFactory;
    protected $table = 'new';
//    protected $fillable = [
//        'title',
//        'content'
//    ];
    protected $casts = [
        'create_time' => 'timestamp',
    ];
}

