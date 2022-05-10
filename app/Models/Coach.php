<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        "phone",
        "address"
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function sessionsCoaches(): HasMany
    {
        return $this->hasMany(SessionsCoaches::class);
    }

}
