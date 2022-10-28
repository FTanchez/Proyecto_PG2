<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ticket_type')->insert([
            'id' => 1,
            'name' => "VULNERABILIDAD",
            'status' => true
        ]);
        DB::table('ticket_type')->insert([
            'id' => 2,
            'name' => "LINEA_BASE",
            'status' => true
        ]);
    }
}
