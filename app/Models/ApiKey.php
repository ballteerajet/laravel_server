<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    // กำหนดชื่อของตาราง
    protected $table = 'api_keys';

    // กำหนดให้ fillable กับคอลัมน์ที่อนุญาตให้กรอกได้
    protected $fillable = ['key'];
}