<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorieslisteningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories_listening', function (Blueprint $table) {
            $table-> string('uid',100);
            $table->foreign('uid') -> references('id')->on('USERS');
            $table-> string('song_id',100);
            $table->foreign('song_id') -> references('song_id')->on('songs');
            $table->timestamp('time');
            $table->primary(['uid', 'time','song_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories_listening');
    }
}
