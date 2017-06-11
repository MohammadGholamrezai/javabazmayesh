<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceToDoctor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_to_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->index()->unsigned();
            $table->integer('user_id')->index()->unsigned()->comment('sample: doctor_id');
            $table->float('price',14,1)->nullable();
            $table->smallInteger('tax')->nullable()->comment('with % percent');
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
        Schema::dropIfExists('services_to_users');
    }
}
