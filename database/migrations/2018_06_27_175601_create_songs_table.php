<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->primary(['song_id', 'uid']);
           // $table->primary('song_id','uid');
            $table-> string('song_id',100);
            $table-> string('uid',100);
            $table->foreign('uid') -> references('id')->on('USERS');
            $table-> string('song_name',100);
            $table->string('song_image')->default('https://lh4.googleusercontent.com/EVhHo-1fcQfDiHk8OsC8fD977oFyhIAWQrBJuivIITyQTk4kJ_UlXYH79XMbobCI3MoVZ-PkoYkKJ0pT73uu=w1366-h612');
            $table-> integer('kind_id')->unsigned();
            $table-> integer('singer_id')->unsigned();
            $table-> integer('author_id')->unsigned();
            $table->foreign('kind_id') -> references('kind_id')->on('KINDSONGS');
            $table->foreign('singer_id') -> references('artist_id')->on('artists');
            $table->foreign('author_id') -> references('artist_id')->on('artists');
            $table-> string('link');
            $table-> integer('amount_view')->default(0);
            $table-> integer('nation_id')->unsigned();
            $table->foreign('nation_id') -> references('nation_id')->on('NATIONS');
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
        Schema::dropIfExists('songs');
    }
}
