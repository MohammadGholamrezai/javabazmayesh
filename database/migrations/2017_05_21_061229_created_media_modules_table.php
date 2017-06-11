<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatedMediaModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_id')->index()->unsigned();
            $table->string('system')->default('post')->index();
            $table->integer('item_id')->index();
            $table->string('title')->nullable();
            $table->string('alias')->nullable();
            $table->boolean('is_default')->nullable()->index();
            $table->boolean('is_public')->nullable()->index();
            $table->integer('user_id')->nullable()->index()->unsigned();
            $table->integer('employee_id')->nullable()->index()->unsigned();
            $table->tinyInteger('sort')->default(50);
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
        Schema::dropIfExists('media_modules');
    }
}
