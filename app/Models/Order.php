<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'user_id',
        'guest_first_name',
        'guest_last_name',
        'guest_email',
        'guest_phone',
        'shop_id',
        'receiving_at',
        'received_at',
        'status',
        'message',
    ];

    /**
     * User relationship.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Recipe relationship.
     */
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
