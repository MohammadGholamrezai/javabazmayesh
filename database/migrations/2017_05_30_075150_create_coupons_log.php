<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coupons_id')->index()->unsigned();
            $table->integer('coupons_details_id')->nullable()->index()->unsigned();
            $table->integer('user_id')->nullable()->index()->unsigned();
            $table->integer('order_id')->index()->unsigned();
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
        Schema::dropIfExists('coupons_log');
    }
}
