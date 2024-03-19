<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShopsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('shops')->delete();

        \DB::table('shops')->insert(array (
            0 =>
            array (
                'id' => 'M01',
                'area_id' => 5,
                'name' => 'あすと長町クローバ薬局',
                'postcode' => '9820007',
                'address' => '宮城県仙台市太白区あすと長町3丁目 3-26',
                'lat' => '38.21827376445645',
                'lng' => '140.8859555385906',
                'tel' => '022-304-1361',
                'hours' => NULL,
                'holiday' => '日曜日・祝日',
                'note' => NULL,
                'payable' => 1,
                'email' => 'M01@shohousen.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$v.KVU6dd1uAF1qyK/sSz2OhvFsxSSC1ULaNi4X78lxB4hdW72Emca',
                'remember_token' => NULL,
                'created_at' => '2024-03-14 00:22:54',
                'updated_at' => '2024-03-14 00:22:54',
            ),
            1 =>
            array (
                'id' => 'S01',
                'area_id' => 2,
                'name' => '青葉調剤薬局',
                'postcode' => '1890002',
                'address' => '東村山市青葉町2-1-17',
                'lat' => '35.76021832663593',
                'lng' => '139.4887766780554',
                'tel' => '042-393-7989',
                'hours' => '平日：9:00～18:00
土曜：9:00～13:00',
                'holiday' => '日曜日・祝日',
                'note' => NULL,
                'payable' => 1,
                'email' => 'S01@shohousen.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$szRpiH92C/0F/drcmO8ZRudeFSOujHoi/2/UPmKYb6jgTgJGzWP6u',
                'remember_token' => NULL,
                'created_at' => '2024-03-14 00:15:27',
                'updated_at' => '2024-03-14 00:15:27',
            ),
            2 =>
            array (
                'id' => 'S02',
                'area_id' => 2,
                'name' => '上尾クローバ薬局',
                'postcode' => '3620003',
                'address' => '上尾市菅谷265-1',
                'lat' => '35.99647128170688',
                'lng' => '139.58943299155442',
                'tel' => '048-778-7725',
                'hours' => NULL,
                'holiday' => '日曜日・祝日',
                'note' => NULL,
                'payable' => 1,
                'email' => 'S02@shohousen.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$KajFy2TKRuaABtuR19WTEeFLMN8JYAxPjCjDknU8.7g1OoaN.Lria',
                'remember_token' => NULL,
                'created_at' => '2024-03-14 00:19:34',
                'updated_at' => '2024-03-14 00:19:34',
            ),
            3 =>
            array (
                'id' => 'T01',
                'area_id' => 1,
                'name' => '赤羽調剤薬局',
                'postcode' => '1150045',
                'address' => '北区赤羽2-4-14蛇の目赤羽ビル1階',
                'lat' => '35.77926617265497',
                'lng' => '139.72482174426403',
                'tel' => '03-3901-5179',
                'hours' => '平日：9:00～19:30
土曜：9:00～13:00',
                'holiday' => '日曜日・祝日',
                'note' => NULL,
                'payable' => 1,
                'email' => 'T01@shohousen.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$wmhIcCliwGErj0nFBk.7oOoGvCs2SrDewhF6.1r6SLDIQVtjp0.ky',
                'remember_token' => NULL,
                'created_at' => '2024-03-14 00:17:48',
                'updated_at' => '2024-03-14 00:17:48',
            ),
            4 =>
            array (
                'id' => 'T02',
                'area_id' => 1,
                'name' => '赤羽調剤薬局LaLa店',
                'postcode' => '1150045',
                'address' => '北区赤羽2-4-10金剛第二ビル1階',
                'lat' => '35.77930762662659',
                'lng' => '139.72403683361293',
                'tel' => '03-3598-9171',
                'hours' => '9:00〜18:00',
                'holiday' => '日曜日・祝日',
                'note' => NULL,
                'payable' => 1,
                'email' => 'T02@shohousen.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$i0hCo8AmSVb7rhgi88UFZuD/0rtJJ2HkK1atykvEP.EgooMDI2Oh6',
                'remember_token' => NULL,
                'created_at' => '2024-03-14 02:28:04',
                'updated_at' => '2024-03-14 02:28:04',
            ),
        ));


    }
}
