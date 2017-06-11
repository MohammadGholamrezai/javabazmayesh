<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLabResultTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_results_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lab_result_id')->index()->unsigned();
            $table->integer('owner_id')->index()->unsigned()->comment('is user id in lab_result');
            $table->text('description')->nullable();
            $table->boolean('only_one_response')->nullable()->comment('if user need to 1 response from doctor');
            $table->text('params')->nullable();
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
        Schema::dropIfExists('lab_results_transactions');
    }
}
