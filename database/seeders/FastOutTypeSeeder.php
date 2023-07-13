<?php

namespace Database\Seeders;

use App\Models\FastOutType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FastOutTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = file_get_contents(__DIR__.'/data/fast_out_types.json');
        $data = json_decode($jsonFile);
        foreach ($data->fastOutTypes as $datum) {
            FastOutType::create(['value' => $datum->value]);
        }
    }
}
