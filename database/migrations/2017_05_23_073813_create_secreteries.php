<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecreteries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secretaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned()->comment('sample: doctor_id');
            $table->integer('secretary_id')->index()->unsigned()->comment('user_id');
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
        Schema::dropIfExists('secretaries');
    }
}
