<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array("Sarajevo", "London", "Berlin", "Vienna");
        $insert = [];
        foreach ($cities as $name) {
            $insert[] = [
                'name' => $name
            ];
        }
        DB::table('cities')->insert($insert);
    }
}
