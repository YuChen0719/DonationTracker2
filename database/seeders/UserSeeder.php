<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@dt.com',
            'password' => Hash::make('admin'),
            'user_type' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'SuperAdmin User',
            'email' => 'super_admin@dt.com',
            'password' => Hash::make('super_admin'),
            'user_type' => 'super_admin',
        ]);
    }
}
