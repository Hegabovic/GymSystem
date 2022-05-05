<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'attendence';

    protected $fillable = [
        'customer_id',
        'gym_id',
        'training_session_id',
    ];
  
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value);
    }


    public function training_session()
    {
        
        return $this->belongsTo(Training_session::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

}
