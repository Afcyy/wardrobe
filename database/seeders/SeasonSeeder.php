<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Season::insert([
            ['name' => 'spring'],
            ['name' => 'summer'],
            ['name' => 'autumn'],
            ['name' => 'winter']
        ]);
    }
}
