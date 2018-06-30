<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSonglistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songlists', function (Blueprint $table) {
            $table->primary(['playlist_id', 'song_id']);
            $table-> string('song_id',100);
            $table-> integer('playlist_id')->unsigned();
            $table->foreign('playlist_id') -> references('playlist_id')->on('playlists');
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
        Schema::dropIfExists('songlists');
    }
}
