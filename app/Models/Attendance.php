<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    use HasFactory;
    protected $table = 'attendence';

    protected $fillable = [
        'name',
        'email',
        'password',
        'training_session_name',
        

    ];

    public function training_session()
    {
        return $this->belongsTo(Training_session::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

}
