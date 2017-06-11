<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLabServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lab_id')->index()->unsigned()->comment('relation to user id');
            $table->integer('service_id')->index()->unsigned();
            $table->float('price',12,2)->nullable();
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
        Schema::dropIfExists('lab_services');
    }
}
