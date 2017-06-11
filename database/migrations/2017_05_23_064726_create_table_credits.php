<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCredits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->float('cash',14,1)->nullable();
            $table->float('paid',14,1)->nullable()->comment('pardakht shodeh');
            $table->float('cost',14,1)->nullable()->comment('hazine shodeh');
            $table->float('income',14,1)->nullable()->comment('kasb daramad');
            $table->float('block_income',14,1)->nullable()->comment('block shodeh');
            $table->float('block_cost',14,1)->nullable()->comment('block shodeh');

            $table->tinyInteger('pay_status')->nullable();
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
        Schema::dropIfExists('credits');
    }
}
