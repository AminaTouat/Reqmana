<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('use_cases', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->string('image')->unique();
            $table->string('title')->nullable();
            $table->integer('projet_id')->unsigned()->index();
        });
        Schema::table('use_cases', function($table) {
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');;
        
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('use_cases');
    }
}
