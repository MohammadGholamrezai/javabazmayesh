<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertismentsLang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements_lang', function (Blueprint $table) {
            $table->integer('id')->index()->unsigned();
            $table->integer('lang_id');
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('body_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements_lang');
    }
}
