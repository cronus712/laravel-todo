<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); 
            $table->integer('project_id'); 
            $table->string('name');
            $table->text('detail');
            $table->timestamps();
            $table->softDeletes();  
        });
        
        // Schema::table('tasks', function($table) {
        //     $table->integer('project_id');
        // });
        // Schema::table('tasks', function($table) {
        //     $table->text('title');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
