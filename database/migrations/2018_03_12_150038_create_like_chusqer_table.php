<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeChusqerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_chusqers', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('chusqer_id')->unsigned();
            $table->timestamps();
            $table->primary(['user_id', 'chusqer_id']);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chusqer_id')->references('id')->on('chusqers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_chusqers');
    }
}
