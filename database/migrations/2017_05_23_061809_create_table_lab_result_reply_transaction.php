<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLabResultReplyTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_result_reply_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lrft_id')->index()->unsigned();
            $table->integer('owner_id')->index()->unsigned()->comment('sample: doctor_id');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('lab_result_reply_transaction');
    }
}
