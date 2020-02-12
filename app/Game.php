<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_id',
        'user_id'
    ];

    /**
     * Get the User for the game.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }



    /**
     * Get the file for the game.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function file()
    {
        return $this->hasOne(UserFile::class, 'id', 'file_id');
    }

    /**
     * Get the cards for the game.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function cards()
    {
        return $this->hasMany(GameCard::class);
    }

    /**
     * Get all line numbers for the game
     *
     * @return array
     */
    public function getAllLinesAttribute()
    {
        return $this->cards()->select('line')->distinct()->get()->pluck('line')->toArray();
    }

    /**
     * Get lines for the game
     *
     * @return \Illuminate\Support\Collection
     */
    public function getLinesAttribute()
    {
        $lines = collect();

        foreach ($this->all_lines as $line) {
            $lines->push([
                'line' => $line
            ]);
        }

        $userId = $this->user->id;

        foreach ($this->cards as $cards) {
            $index = $lines->search(function ($item, $key) use ($cards) {
                return $item['line'] == $cards->line;
            });

            if ($cards->player == 1) {
                $lines[$index] = collect($lines[$index])->merge([
                    'user' => [
                        $cards->card_1,
                        $cards->card_2,
                        $cards->card_3,
                        $cards->card_4,
                        $cards->card_5,
                    ]
                ]);
            } else if ($cards->player == 2) {
                $lines[$index] = collect($lines[$index])->merge([
                    'opponent' => [
                        $cards->card_1,
                        $cards->card_2,
                        $cards->card_3,
                        $cards->card_4,
                        $cards->card_5,
                    ]
                ]);
            }
        }

        return $lines;
    }
}
