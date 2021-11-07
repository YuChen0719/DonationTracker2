<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Charity;
class CharitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('charities')->insert([
            'name' => 'Admin Charity',
            'description' => 'Admin`s charitable efforts',
            'address' => '1 Admin Street',
            'email' => 'admin@dt.com',
            'phone' => '2136545221',
            'active' => 1,
        ]);
            
        $user = User::firstWhere('email', 'admin@dt.com');
        $user->charity_id = Charity::firstWhere('email', $user->email)->id;

        $user->save();
    }
}
