<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'first_name' => '太郎',
                'last_name' => '山田',
                'first_kana' => 'タロウ',
                'last_kana' => 'ヤマダ',
                'gender' => 'man',
                'birth_year' => '1970',
                'birth_month' => '4',
                'birth_day' => '1',
                'phone' => '09012345678',
                'shop_id' => 'T01',
                'notification' => 1,
                'active' => 1,
                'email' => 'taro.yamada@shohousen.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$3kU7E5hpiUN5hgGCqO8iiOitd5W5hB6o4DbzJegNIoSe6v0nccOym',
                'remember_token' => NULL,
                'created_at' => '2024-03-19 14:12:31',
                'updated_at' => '2024-03-19 14:12:31',
            ),
        ));


    }
}
