<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    protected $fillable = [
        'id',
        'name',
        'price',
        'number_of_sessions',
    ];
    use HasFactory;
    use SoftDeletes;


    //Price formula
    public function toDollar()
    {
        return $this->price / 100;
    }
}
