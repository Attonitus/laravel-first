<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;
    protected $table = "card_listings";
    protected $fillable = [
        'name',
        'description',
        'bidding',
        'condition',
        'rarity',
        'country',
        'type',
        'illustrator',
        'card_img',
        'value',
        'user_id'
    ];

    //Relation to user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
