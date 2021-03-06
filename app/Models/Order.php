<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'gym_id',
        'customer_id',
        'pkg_id',
        'remaining_sessions',
    ];
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function gym(): BelongsTo
    {
        return $this->belongsTo(Gym::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'created_by', 'pkg_id');
    }

    public function ordersCount(): int
    {
        return $this->hasMany(Order::class)->count();
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value);
    }

}
