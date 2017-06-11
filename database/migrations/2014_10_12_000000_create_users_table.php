<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->index()->unique();
            $table->string('mobile')->index()->unique();
            $table->string('password');
            $table->integer('user_type_id')->index()->comment('relation to users_type');
            $table->integer('city_id')->index()->nullable()->comment('default user city');
            $table->float('cash',12,2)->nullable()->comment('cash of user in time');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
