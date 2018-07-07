<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_song', function (Blueprint $table) {
            $table->primary(['artist_id', 'song_id']);
            $table-> string('song_id',100);
            $table-> integer('artist_id')->unsigned();
            $table->foreign('artist_id') -> references('artist_id')->on('artists');
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
        Schema::dropIfExists('author_song');
    }
}
