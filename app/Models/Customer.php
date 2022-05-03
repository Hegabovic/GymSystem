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
        'avatar_image',
        'birth_date',
        'gender',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}