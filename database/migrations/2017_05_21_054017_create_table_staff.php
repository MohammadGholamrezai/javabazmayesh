<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer')->index()->unsigned()->comment('user is employer, relation users');
            $table->integer('user_id')->index()->unsigned()->comment('user is staff, relation users');
            $table->date('expire_date')->nullable();
            $table->text('params')->nullable();
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
        Schema::dropIfExists('users_staff');
    }
}
