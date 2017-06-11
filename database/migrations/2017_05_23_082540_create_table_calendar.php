<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCalendar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->string('name');
            $table->integer('year_days')->default(365);
            $table->integer('year');
            $table->smallInteger('period_time')->nullable()->comment('doreh har zaman');
            $table->smallInteger('off_period_time')->nullable()->comment('tanafose har doreh');
            $table->smallInteger('lunch_time')->nullable()->comment('zamane nahar be min');
            $table->smallInteger('dinner_time')->nullable()->comment('zamane sham be min');
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
        Schema::dropIfExists('calendars');
    }
}
