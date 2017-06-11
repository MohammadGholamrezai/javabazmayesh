<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccesGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_access_group', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullabel()->index()->unsigned();
            $table->integer('employee_id')->nullabel()->index()->unsigned();
            $table->integer('access_group_id')->index()->unsigned();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('user_access_group');
    }
}
