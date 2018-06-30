<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->increments('playlist_id');
            $table-> string('uid',100);
            $table->foreign('uid') -> references('id')->on('USERS');
            $table-> string('name_playlist',120);
            $table-> string('playlist_image')->default('https://lh4.googleusercontent.com/EVhHo-1fcQfDiHk8OsC8fD977oFyhIAWQrBJuivIITyQTk4kJ_UlXYH79XMbobCI3MoVZ-PkoYkKJ0pT73uu=w1366-h612');
            $table-> integer('amount_view')->default(0);
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
        Schema::dropIfExists('playlists');
    }
}
