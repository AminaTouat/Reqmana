<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('projet_id')->unsigned()->index();
            $table->integer('source')->unsigned()->index()->nullable();
            $table->string('requirementType')->nullable();
            $table->string('importance')->nullable();
            $table->string('entredBy');
             $table->string('fitC')->nullable();
            $table->string('summary')->nullable();
            $table->string('status')->nullable();
            $table->boolean('valide')->default(0);
            $table->text('body')->nullable();
            $table->softDeletes();
        });
        Schema::table('requirements', function($table) {
            $table->foreign('projet_id')->references('id')->on('projets');
    });
        Schema::table('requirements', function($table) {
            $table->foreign('source')->references('id')->on('exigences');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requirements');
    }
}
