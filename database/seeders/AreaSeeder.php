<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    public function run()
    {
        DB::table('areas')->insert([
            [
                'id' => 1,
                'code' => 'tokyo',
                'name' => '東京都',
                'order' => 1,
                'created_at' => '2024-03-01 00:00:00',
                'updated_at' => '2024-03-01 00:00:00',
            ],
            [
                'id' => 2,
                'code' => 'saitama',
                'name' => '埼玉県',
                'order' => 2,
                'created_at' => '2024-03-01 00:00:00',
                'updated_at' => '2024-03-01 00:00:00',
            ],
            [
                'id' => 3,
                'code' => 'kanagawa',
                'name' => '神奈川県',
                'order' => 3,
                'created_at' => '2024-03-01 00:00:00',
                'updated_at' => '2024-03-01 00:00:00',
            ],
            [
                'id' => 4,
                'code' => 'chiba',
                'name' => '千葉県',
                'order' => 4,
                'created_at' => '2024-03-01 00:00:00',
                'updated_at' => '2024-03-01 00:00:00',
            ],
            [
                'id' => 5,
                'code' => 'miyagi',
                'name' => '宮城県',
                'order' => 5,
                'created_at' => '2024-03-01 00:00:00',
                'updated_at' => '2024-03-01 00:00:00',
            ],
        ]);
    }
}
