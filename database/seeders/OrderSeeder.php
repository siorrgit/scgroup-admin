<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('orders')->delete();

        \DB::table('orders')->insert(array (
            0 =>
            array (
                'id' => 1,
                'number' => 'T01-240321-001',
                'user_id' => NULL,
                'guest_first_name' => '今日一',
                'guest_last_name' => '下巣戸',
                'guest_email' => 'kyoichi.gesuto@example.com',
                'guest_phone' => '09012345678',
                'shop_id' => 'T01',
                'receiving_at' => '2024-03-20 05:46:38',
                'received_at' => NULL,
                'status' => 'incomplete_sent',
                'message' => '',
                'created_at' => '2024-03-20 05:46:38',
                'updated_at' => '2024-03-20 05:46:38',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'number' => 'T01-240321-002',
                'user_id' => 1,
                'guest_first_name' => '',
                'guest_last_name' => '',
                'guest_email' => '',
                'guest_phone' => '',
                'shop_id' => 'T01',
                'receiving_at' => '2024-03-20 05:46:38',
                'received_at' => '2024-03-20 05:46:38',
                'status' => 'complete_apppayed',
                'message' => 'ジェネリックでお願いします。',
                'created_at' => '2024-03-20 05:46:38',
                'updated_at' => '2024-03-20 05:46:38',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'number' => 'T01-240321-003',
                'user_id' => 1,
                'guest_first_name' => '',
                'guest_last_name' => '',
                'guest_email' => '',
                'guest_phone' => '',
                'shop_id' => 'T01',
                'receiving_at' => '2024-03-20 05:46:38',
                'received_at' => '2024-03-20 05:46:38',
                'status' => 'incomplete_notified',
                'message' => 'ジェネリックでお願いします。',
                'created_at' => '2024-03-20 05:46:38',
                'updated_at' => '2024-03-20 05:46:38',
                'deleted_at' => NULL,
            ),
         ));


    }
}
