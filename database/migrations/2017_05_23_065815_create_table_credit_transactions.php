<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCreditTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('credit_id')->index()->unsigned()->comment('or recipient');
            $table->string('type')->comment('income,callback,settle is +, cost,paid is -');
            $table->integer('user_id')->index()->unsigned()->commnet('owner, payer, pardakht konandeh');
            $table->float('price',14,1);
            $table->boolean('is_block')->nullable();
            $table->string('ref_id')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('ref_type')->nullable()->comment('name ref, sample ersal baraye doctor LRFT');
            $table->string('au_number')->nullable()->comment('authority');
            $table->tinyInteger('settle_status')->nullable()->comment('vaziat pardakht');

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
        Schema::dropIfExists('credit_transactions');
    }
}
