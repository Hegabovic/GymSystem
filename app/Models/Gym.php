<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gym extends Model
{
    protected $fillable = [
         'id',
        'name',
        'created at',
        'cover_image',
        'city_manger',

    ];



    use HasFactory;

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
