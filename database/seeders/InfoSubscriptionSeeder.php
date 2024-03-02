<?php

namespace Database\Seeders;

use App\Enums\EnumCategorie;
use App\Enums\EnumChannel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserción de los usuarios iniciales
        $userOneId = DB::table('users')->insertGetId([
            'name' => 'Juan Ortega Ramirez',
            'email' => 'juan@gmail.com',
            'phone_number' => '2221114444'
        ]);

        $userTwoId = DB::table('users')->insertGetId([
            'name' => 'Emiliano Sánchez Pérez',
            'email' => 'emiliano@gmail.com',
            'phone_number' => '2221115555'
        ]);

        $userThreeId = DB::table('users')->insertGetId([
            'name' => 'Mariana González Flores',
            'email' => 'mariana@gmail.com',
            'phone_number' => '2221116666'
        ]);

        //inserción de las categorías iniciales
        $categoryMovieId = DB::table('categories')->insertGetId([
            'name' => EnumCategorie::MOVIES,
        ]);

        $categorySportId = DB::table('categories')->insertGetId([
            'name' => EnumCategorie::SPORTS,
        ]);

        $categoryFinanceId = DB::table('categories')->insertGetId([
            'name' => EnumCategorie::FINANCE,
        ]);

        //inserción de los canales iniciales
        $channelEmailId = DB::table('channels')->insertGetId([
            'name' => EnumChannel::EMAIL
        ]);

        $channelSmsId = DB::table('channels')->insertGetId([
            'name' => EnumChannel::SMS
        ]);

        $channelPushNotificationId = DB::table('channels')->insertGetId([
            'name' => EnumChannel::PUSHNOTIFICATION
        ]);

        DB::table('subscriptions')->insertGetId([
            'category_id_foreign' => $categoryMovieId,
            'user_id_foreign' => $userOneId,
            'channel_id_foreign' => $channelEmailId
        ]);

        DB::table('subscriptions')->insertGetId([
            'category_id_foreign' => $categoryFinanceId,
            'user_id_foreign' => $userOneId,
            'channel_id_foreign' => $channelSmsId
        ]);

        // inserción suscripción dos
        DB::table('subscriptions')->insertGetId([
            'category_id_foreign' => $categoryFinanceId,
            'user_id_foreign' => $userTwoId,
            'channel_id_foreign' => $channelPushNotificationId
        ]);

        // inserción suscripción tres para el usuario tres
        DB::table('subscriptions')->insertGetId([
            'category_id_foreign' => $categorySportId,
            'user_id_foreign' => $userThreeId,
            'channel_id_foreign' => $channelSmsId
        ]);
    }
}
