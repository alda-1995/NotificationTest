<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_messages', function (Blueprint $table) {
            $table->increments('notification_message_id');
            $table->mediumText("message");
            $table->timestamps();

            $table->integer('subscription_id_foreign')->nullable()->unsigned();
            //categoria de la suscripción
            $table->foreign('subscription_id_foreign')
                ->references('subscription_id')
                ->on('subscriptions')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_messages');
    }
}
