<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table-> increments('artist_id'); //khóa chính tự tăng
            $table-> string('artist_name');
            $table-> string('artist_image')->default('https://eabiawak.com/wp-content/uploads/2017/07/photo.png');
            $table-> text('info_summary');
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
        Schema::dropIfExists('artists');
    }
}
