<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKindSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kind_song', function (Blueprint $table) {
            $table->primary(['kind_id', 'song_id']);
            $table-> string('song_id',100);
            $table-> integer('kind_id')->unsigned();
            $table->foreign('kind_id') -> references('kind_id')->on('kinds');
            $table->foreign('song_id') -> references('song_id')->on('songs');
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
        Schema::dropIfExists('kind_song');
    }
}
