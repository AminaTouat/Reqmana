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
            $table->integer('exigence_id')->unsigned()->index()->nullable();
            $table->string('requirementType')->nullable();
            $table->string('importance')->nullable();
            $table->string('entredBy');
             $table->string('fitC')->nullable();
            $table->string('summary')->nullable();
            $table->string('status')->default('Draft');
            $table->boolean('valide')->default(0);
            $table->text('body')->nullable();
            $table->softDeletes();
        });
        Schema::table('requirements', function($table) {
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');;
    });
        Schema::table('requirements', function($table) {
            $table->foreign('exigence_id')->references('id')->on('exigences')->onDelete('cascade');;
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
