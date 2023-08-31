<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('account_types')->insert([
            ['type' => 'Standard'],
            ['type' => 'Silver'],
            ['type' => 'Gold'],
            ['type' => 'Platinum'],
        ]);
    }
}
