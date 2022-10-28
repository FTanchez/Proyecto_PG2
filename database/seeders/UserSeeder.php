<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => "Administrador",
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1,
            'status' => true
        ]);
        DB::table('users')->insert([
            'name' => "User Agent",
            'email' => 'agent@agent.com',
            'password' => Hash::make('agent123'),
            'role_id' => 2,
            'status' => true
        ]);
        DB::table('users')->insert([
            'name' => "unassigned",
            'email' => 'unassigned',
            'password' => Hash::make('admin123'),
            'role_id' => 1,
            'status' => true
        ]);
    }
}
