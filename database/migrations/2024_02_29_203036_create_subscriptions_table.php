<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('subscription_id');

            $table->integer('category_id_foreign')->nullable()->unsigned();
            //categoria de la suscripción
            $table->foreign('category_id_foreign')
                ->references('category_id')
                ->on('categories')->nullOnDelete();

            $table->integer('channel_id_foreign')->nullable()->unsigned();
            //canal de la suscripción
            $table->foreign('channel_id_foreign')
                ->references('channel_id')
                ->on('channels')->nullOnDelete();

            $table->integer('user_id_foreign')->nullable()->unsigned();
            //usuario al que pertenece la suscripción
            $table->foreign('user_id_foreign')
                ->references('user_id')
                ->on('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
