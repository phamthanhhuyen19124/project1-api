<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';// tên bảng tương ứng trong cs dữ liệu
   protected $fillable = [
       'name'
   ];

   protected $casts = [
       'created_at' => 'timestamp',
       'updated_at' => 'timestamp',
   ];
}
