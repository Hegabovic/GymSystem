<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityManager extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'n_id',
        'avatar_path',
        'city_id'
    ];
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
