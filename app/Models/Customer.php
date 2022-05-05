<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'national_id',
        'avatar_path',
        'birth_date',
        'gender',
    ];
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
