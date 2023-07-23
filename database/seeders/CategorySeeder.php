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
                'name' => 'Cấu trúc dữ liệu',
                'slug' => 'cau-truc-du-lieu',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'Giải thuật',
                'slug' => 'giai-thuat',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'created_by' => 1,
                'updated_by' => 1
            ]
        ]);
    }
}
