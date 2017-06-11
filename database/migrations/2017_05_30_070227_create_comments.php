<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('system');
            $table->integer('item_id')->index()->unsigned();
            $table->string('email')->nullable();
            $table->string('user_name')->nullable();
            $table->text('text');
            $table->integer('parent_id')->default(0)->index();
            $table->integer('user_id')->nullable()->index()->unsigned();
            $table->integer('employee_id')->nullable();
            $table->integer('assessor_user_id')->nullable();
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
        Schema::dropIfExists('comments');
    }
}
