<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->format('Y-m-d');
        DB::table('tags')->insert([
            [
                'name' => 'PHP',
                'slug' => 'php',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Algorithm',
                'slug' => 'algorithm',
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
    }
}
