<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Outfit extends Model
{
    protected $fillable = [
        'group_id', 'clothing_id'
    ];

    use HasFactory;


    public function clothing(): HasOne
    {
        return $this->hasOne(Clothing::class, 'id', 'clothing_id');
    }
}
