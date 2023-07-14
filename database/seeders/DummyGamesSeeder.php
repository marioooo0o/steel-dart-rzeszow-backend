<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyGamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = file_get_contents(__DIR__.'/data/dummy_games.json');
        $data = json_decode($jsonFile);
        foreach ($data->games as $value){
            Game::create([
                "player_one" => $value->player_one,
                "player_two" => $value->player_two,
                "player_one_score"=> $value->player_one_score,
                "player_two_score"=> $value->player_two_score,
                "player_one_avg" =>$value->player_one_avg,
                "player_two_avg" => $value->player_two_avg,
                "player_one_max_amount" => $value->player_one_max_amount,
                "player_two_max_amount" => $value->player_two_max_amount,
                "league_id" => $value->league_id,
                "winner" => $value->winner
            ]);
        }
    }
}
