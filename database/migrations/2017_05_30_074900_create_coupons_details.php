<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coupons_id')->index()->unsigned();
            $table->integer('user_id')->nullable()->index()->unsigned();
            $table->integer('group_id')->nullable()->index()->unsigned();
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
        Schema::dropIfExists('coupons_details');
    }
}
