<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('access_group_id')->index()->unsigned()->nullable();
            $table->integer('user_id')->index()->unsigned()->nullable();
            $table->integer('employee_id')->index()->unsigned()->nullable();
            $table->integer('action_id')->index()->unsigned()->nullable();
            $table->boolean('access')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->integer('creator_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_list');
    }
}
