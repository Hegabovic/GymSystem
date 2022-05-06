<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SessionsCoaches extends Model
{
    use HasFactory;

    public function coaches(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }

    public function trainingSessions(): BelongsTo
    {
        return $this->belongsTo(Training_session::class);
    }

    protected $fillable = [
        'coach_id',
        'session_id',
    ];


}
