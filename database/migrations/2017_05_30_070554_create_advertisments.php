<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type',['image','video','flash'])->default('image');
            $table->smallInteger('sort')->default(1);
            $table->string('position')->nullable()->comment('is alias position');
            $table->text('params')->nullable();
            $table->string('url')->nullable();
            $table->string('file_path')->nullable();
            $table->string('extension',5)->nullable();
            $table->string('group_show')->default('public'); // example: public
            $table->integer('employee_id');
            $table->boolean('show_status')->default(0);
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
        Schema::dropIfExists('advertisements');
    }
}
