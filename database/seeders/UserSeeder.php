<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->format(config('constant.DATETIME_FORMAT_SQL'));

        DB::table('users')->insert([
            [
                'name' => 'HauNT',
                'role_id' => 1,
                'email' => 'trunghau172837@gmail.com',
                'password' => bcrypt('12345qqqqq'),
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ]
        ]);
    }
}
