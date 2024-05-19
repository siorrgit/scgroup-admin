<?php

namespace App\Models;

use App\Models\Recipe;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'is_spot',
        'receiving_at',
        'received_at',
        'status',
        'message',
    ];

    protected $casts = [
        'is_spot' => 'boolean',
    ];

    /**
     * User relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Shop relationship.
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Recipe relationship.
     */
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
