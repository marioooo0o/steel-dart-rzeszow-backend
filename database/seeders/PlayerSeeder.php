<?php

namespace Database\Seeders;

use App\Models\League;
use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = file_get_contents(__DIR__.'/data/players.json');
        $data = json_decode($jsonFile);
        foreach ($data->players as $value){
            $league = League::where('league_name', $value->league_name)->first();
            Player::create([
                'name' => $value->name,
                'second_name' => $value->second_name,
                'points' => $value->points,
                'balance' => $value->balance,
                'legs_won' => $value->legs_won,
                'legs_lost' => $value->legs_lost,
                'avg' => $value->avg,
                'max_amount' => $value->max_amount,
                'league_id' => $league->id
            ]);
        }
    }
}
