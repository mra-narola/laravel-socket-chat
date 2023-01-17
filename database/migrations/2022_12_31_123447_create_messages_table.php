<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('sender_id')->unsigned()->comment('User id, who send message');
            $table->integer('receiver_id')->unsigned()->comment('User id, who receive message');
            $table->text('message');
            $table->boolean('is_message_seen')->default(false)->comment('0 - Message is unseen, 1 Message is seen');
            $table->integer('reply_id')->unsigned()->default(0)->comment('0 - Main message, else Message id');
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
