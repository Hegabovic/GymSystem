<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function cityManager()
    {
        return $this->hasOne(CityManager::class);
    }

    public function gyms()
    {
        return $this->hasMany(Gym::class);
    }
}
