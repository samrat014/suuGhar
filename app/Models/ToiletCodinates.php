<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToiletCodinates extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'nearest_station',
        'image_url',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    
}
