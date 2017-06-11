<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCalendarDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calendar_id')->index()->unsigned();
            $table->dateTime('period')->nullable()->index();
            $table->tinyInteger('reserved')->nullable()->comment('1:open , 2:wait , 3:reserved');
            $table->boolean('is_off')->nullable();

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
        Schema::dropIfExists('calendar_details');
    }
}
