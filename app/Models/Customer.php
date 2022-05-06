<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'avatar_path',
        'birth_date',
        'gender',
        'last_login'
    ];
    public function getLastLoginAtAttribute()
    {
        return Carbon::parse($this->last_login);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

}
