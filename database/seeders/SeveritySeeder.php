<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeveritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('severity')->insert([
            'name' => "Crítico",
            'status' => true,
            'baseline' => false
        ]);
        DB::table('severity')->insert([
            'name' => "Alta",
            'status' => true,
            'baseline' => false
        ]);
        DB::table('severity')->insert([
            'name' => "Media",
            'status' => true,
            'baseline' => false
        ]);
        DB::table('severity')->insert([
            'name' => "Baja",
            'status' => true,
            'baseline' => false
        ]);
        DB::table('severity')->insert([
            'name' => "Failed",
            'status' => true,
            'baseline' => true
        ]);
        DB::table('severity')->insert([
            'name' => "Passed",
            'status' => true,
            'baseline' => true
        ]);
    }
}
