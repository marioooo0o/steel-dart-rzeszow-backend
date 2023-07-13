<?php

namespace Database\Seeders;

use App\Models\HighOutType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HighOutTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = file_get_contents(__DIR__.'/data/high_out_types.json');
        $data = json_decode($jsonFile);
        foreach ($data->highOutTypes as $datum) {
            HighOutType::create(['value'=>$datum->value]);
        }
    }
}
