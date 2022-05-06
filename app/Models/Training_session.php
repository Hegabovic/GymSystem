<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training_session extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function sessionsCoaches(): HasMany
    {
        return $this->hasMany(SessionsCoaches::class);
    }

    public function attendaces(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    protected $fillable = [
        'name',
        'start_at',
        'finish_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'start_at' => 'datetime',
        'finish_at' => 'datetime'
    ];

    public function sessionCoaches(): HasMany
    {
        return $this->hasMany(SessionsCoaches::class, 'session_id', 'id');
    }

}
