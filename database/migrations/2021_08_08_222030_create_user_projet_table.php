<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUserProjetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_projet', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            
            $table->integer('projet_id')->unsigned()->index();
            $table->boolean('inv')->default(1);
            $table->string('role')->default("chef_projet");
        
        });
            Schema::table('user_projet', function($table) {
                $table->foreign('user_id')->references('id')->on('users');
            
        });
            Schema::table('user_projet', function($table) {
                $table->foreign('projet_id')->references('id')->on('projets');
            
        });
            Schema::table('user_projet', function($table) {
                $table->unique(['user_id', 'projet_id']);
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_projet');
    }
}
