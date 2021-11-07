<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Charity;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donors')->insert([
            'donor_number' => 1,
            'name' => 'John Smith',
            'active' => 1,
            'charity_id' => Charity::get()->where('id', 1)->first()->id
        ]);
        DB::table('donors')->insert([
            'donor_number' => 2,
            'name' => 'Jane Doe',
            'active' => 1,
            'charity_id' => Charity::get()->where('id', 1)->first()->id
        ]);
    }
}
