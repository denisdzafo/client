<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array("Phone", "Mobile", "Email", "Skype");
        $insert = [];
        foreach ($types as $name) {
            $insert[] = [
                'name' => $name
            ];
        }
        DB::table('contact_types')->insert($insert);
    }
}
