<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gym extends Model
{
    protected $fillable = [
        'name',
        'cover_image',
        'city_id',
    ];



    use HasFactory;
    use SoftDeletes;

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
