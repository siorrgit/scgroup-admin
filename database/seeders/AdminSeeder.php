<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            [
                'id' => 1,
                'email' => 'master@shohousen.com',
                'email_verified_at' => '2024-03-01 00:00:00',
                'password' => '$2y$12$7vGSPBqSwJWfcq3Zc/BywOeayv3ciGvgY2C1yJgEjbKwwpyA/wkEu',
                'created_at' => '2024-03-01 00:00:00',
                'updated_at' => '2024-03-01 00:00:00',
            ],
        ]);
    }
}
