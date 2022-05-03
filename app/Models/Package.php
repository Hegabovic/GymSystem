<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'id',
       'name',
       'price',
       'number_of_sessions',
   ];
    use HasFactory;
}
