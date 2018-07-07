<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kinds', function (Blueprint $table) {
            $table-> increments('kind_id'); //khóa chính tự tăng
            $table-> string('kind_name');
            $table-> string('kind_image')->default('https://zmp3-photo.zadn.vn/covers/c/5/c5360ad3d2e28b5bb5f0d0930a6a6a6f_1499827454.jpg');
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
        Schema::dropIfExists('kinds');
    }
}
