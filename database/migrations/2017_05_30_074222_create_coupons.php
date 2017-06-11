<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code',50)->index();
            $table->integer('capacity')->default(1);
            $table->integer('used')->default(0);
            $table->boolean('private')->nullable()->comment('if true, use special group or users');
            $table->decimal('price',16,1)->nullable();
            $table->integer('percent')->nullable();
            $table->date('available_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('user_id');
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
        Schema::dropIfExists('coupons');
    }
}
