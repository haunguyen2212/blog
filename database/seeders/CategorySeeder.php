<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Cấu trúc dữ liệu & giải thuật',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'Laravel',
                'created_by' => 1,
                'updated_by' => 1
            ]
        ]);
    }
}
