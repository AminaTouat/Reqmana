<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exigences', function (Blueprint $table) {
  
            $table->integer('use_case_id')->unsigned()->nullable();
  
            $table->foreign('use_case_id')->references('id')->on('use_cases')->onDelete('cascade');;
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
