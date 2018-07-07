<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->primary('id');
            $table-> string('id',80);
            $table->string('name');
            $table->string('email',100);
            $table->unique('email');
            $table->string('password');
            $table->string('image')->default('https://eabiawak.com/wp-content/uploads/2017/07/photo.png');
            $table-> integer('jurisdiction_id');
            $table->foreign('jurisdiction_id') -> references('jurisdiction_id')->on('jurisdiction');
            $table-> integer('status_id');
            $table->foreign('status_id') -> references('status_id')->on('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
