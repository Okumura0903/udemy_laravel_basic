<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('areas')->insert([
            ['name'=>'東京','sort_no'=>1],
            ['name'=>'大阪','sort_no'=>2],
            ['name'=>'福岡','sort_no'=>3]
        ]);
    }
}
