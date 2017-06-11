<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prefix')->nullable();
            $table->string('middleware')->nullable();
            $table->string('controller')->nullable()->index();
            $table->string('function')->nullable()->index();
            $table->string('as_url')->nullable()->index();
            $table->string('uses')->nullable()->index();
            $table->string('only')->nullable();
            $table->string('except')->nullable();
            $table->enum('method',['get','post','put','any','delete','resource','controller'])->default('get');
            $table->text('params')->nullable();
            $table->integer('employee_id');
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
        Schema::dropIfExists('actions_list');
    }
}
