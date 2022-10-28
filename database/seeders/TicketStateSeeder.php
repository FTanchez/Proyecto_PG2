<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('state')->insert([
            'name' => "Asignado",
            'status' => true
        ]);
        DB::table('state')->insert([
            'name' => "Pendiente",
            'status' => true
        ]);
        DB::table('state')->insert([
            'name' => "En Curso",
            'status' => true
        ]);
        DB::table('state')->insert([
            'name' => "Finalizado",
            'status' => true
        ]);
    }
}
