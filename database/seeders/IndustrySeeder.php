<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = array("Chemical Industry", "Rail Industry", "Energy Industry", "Toy Industry");
        $insert = [];
        foreach ($industries as $name) {
            $insert[] = [
                'name' => $name
            ];
        }
        DB::table('industries')->insert($insert);
    }
}
