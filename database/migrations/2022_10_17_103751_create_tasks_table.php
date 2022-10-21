<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('project_id');   
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade'); 
            $table->foreign('project_id')
            ->references('id')
            ->on('projects')
            ->onDelete('cascade');  
            $table->text('name')->unique();
            $table->text('detail');
            $table->timestamps();
            $table->softDeletes();  
        });

        // DB::statement("ALTER TABLE tasks ADD CONSTRAINT FK_locations FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;");
        // DB::statement("ALTER TABLE tasks ADD CONSTRAINT FK_locations FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE;");

        
        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('user_id')
        //           ->references('id')
        //           ->on('users')
        //           ->onDelete('cascade');            
        // });

        // Schema::table('projects', function (Blueprint $table) {
        //     $table->foreign('project_id')
        //           ->references('id')
        //           ->on('projects')
        //           ->onDelete('cascade');            
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
