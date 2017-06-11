<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->index()->unsigned();
            $table->integer('cd_id')->index()->unsigned()->comment('calendar_details_id');
            $table->integer('std_id')->index()->unsigned()->comment('service_to_doctor');
            $table->float('price',14,1)->nullable();
            $table->float('tax',12,1)->nullable();
            $table->float('discount',14,1)->nullable();
            $table->integer('count')->nullable();
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
        Schema::dropIfExists('booking_details');
    }
}
