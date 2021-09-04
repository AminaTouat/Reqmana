<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExigencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exigences', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('projet_id')->unsigned()->index();
            $table->string('requirementType')->nullable();
            $table->string('importance')->nullable();
            $table->string('entredBy');
            $table->string('source');
            $table->string('summary')->nullable();
            $table->string('status')->default('Draft');
            $table->boolean('valide')->default(0);
            $table->text('body')->nullable();
            $table->softDeletes();
        });
        Schema::table('exigences', function($table) {
            $table->foreign('projet_id')->references('id')->on('projets');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exigences');
    }
}
