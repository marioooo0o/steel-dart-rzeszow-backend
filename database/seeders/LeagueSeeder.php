<?php

namespace Database\Seeders;

use App\Models\League;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = file_get_contents(__DIR__.'/data/leagues.json');
        $data = json_decode($jsonFile);
        foreach ($data->leagues as $datum) {
            League::create(['league_name'=>$datum->league_name]);
        }
    }
}
