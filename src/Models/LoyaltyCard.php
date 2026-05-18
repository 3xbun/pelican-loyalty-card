<?php

namespace Plugins\LoyaltyCard\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LoyaltyCard extends Model
{
    protected $fillable = [
        'user_id',
        'points',
        'last_collected_at',
    ];

    protected $casts = [
        'last_collected_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
