<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exigence_id')->unsigned()->index();
            $table->string('comment');
            $table->string('type');
            $table->timestamps();
        });
        Schema::table('links', function($table) {
            $table->foreign('exigence_id')->references('id')->on('exigences');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_link_fnc');
    }
}
