<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExecuteStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('execute')->insert([
            'name' => "Excepción",
            'status' => true
        ]);
        DB::table('execute')->insert([
            'name' => "Justificación",
            'status' => true
        ]);
        DB::table('execute')->insert([
            'name' => "Mitigado",
            'status' => true
        ]);
        DB::table('execute')->insert([
            'name' => "Pendiente",
            'status' => true
        ]);
        DB::table('execute')->insert([
            'name' => "Traslado",
            'status' => true
        ]);
    }
}
