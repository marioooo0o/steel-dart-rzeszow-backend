<?php

namespace App\Services;

use App\Models\Player;

class PlayerService
{
    public function create(array $playerData): Player
    {
         return Player::create([
            'name' => $playerData->name,
            'second_name' => $playerData->second_name,
            'points' => 0,
            'balance' => 0,
            'legs_won' => 0,
            'legs_lost' => 0,
            'avg' => 0,
            'max_amount' => 0,
            'league_id' => $playerData->league_id
        ]);
    }
}
