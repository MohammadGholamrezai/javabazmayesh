<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentLang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents_lang', function (Blueprint $table) {
            $table->integer('id')->index()->unsigned();
            $table->integer('lang_id');
            $table->string('alias')->nullable();
            $table->string('link_title')->nullable();
            $table->string('browser_title')->nullable();
            $table->string('body_title')->nullable();
            $table->text('short_content')->nullable();
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
        Schema::dropIfExists('contents_lang');
    }
}
