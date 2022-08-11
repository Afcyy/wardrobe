<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    protected $fillable = [
        'group_id', 'category', 'image_src'
    ];

    use HasFactory;
}
