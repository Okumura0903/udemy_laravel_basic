<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('shops')->insert([
            ['name'=>'食パン屋','area_id'=>1],
            ['name'=>'クロワッサン屋','area_id'=>2],
            ['name'=>'コッペパン屋','area_id'=>1],
            ['name'=>'メロンパン屋','area_id'=>3]
        ]);
    }
}
