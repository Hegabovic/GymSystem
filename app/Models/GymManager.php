<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'n_id',
        'avatar_path',
        'gym_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class,'gym_id');
    }
}
