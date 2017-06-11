<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('text');
            $table->integer('media_id')->index()->nullable()->unsigned();
            $table->integer('parent_id')->default(0)->index()->unsigned();
            $table->integer('user_id')->nullable()->index()->unsigned();
            $table->integer('employee_id')->nullable()->index()->unsigned();
            $table->boolean('active')->default(0);
            $table->boolean('show_status')->default(0);
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
        Schema::dropIfExists('tickets');
    }
}
