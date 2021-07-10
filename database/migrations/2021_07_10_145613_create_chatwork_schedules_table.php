<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatworkSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('chatwork_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('group_id');
            $table->string('time_number');
            $table->longText('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chatworks');
    }
}
