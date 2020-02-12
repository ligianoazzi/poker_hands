<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameCard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_id',
        'player',
        'line',
        'card_1',
        'card_2',
        'card_3',
        'card_4',
        'card_5',
    ];

    /**
     * Get the game that owns the card.
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
