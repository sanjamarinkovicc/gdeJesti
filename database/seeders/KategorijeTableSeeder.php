<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategorijeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategorijas')->insert(
            [
                ['naziv' => 'ITALIJANSKI'],
                ['naziv' => 'KINESKI'],
                ['naziv' => 'FRANCUSKI'],
                ['naziv' => 'VEGETARIJANSKI']
            ]
        );
    }
}
