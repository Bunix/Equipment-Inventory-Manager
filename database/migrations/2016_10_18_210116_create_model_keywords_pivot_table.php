<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelKeywordsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Model_Keywords', function (Blueprint $table) {
            $table->integer('model_id')->unsigned()->index();
            //$table->foreign('model_id')->references('id')->on('equipment_model')->ondelete('cascade');
            $table->integer('keyword_id')->unsigned()->index();
            //$table->foreign('keyword_id')->references('id')->on('keywords')->ondelete('cascade');
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
        Schema::drop('Model_Keywords');
    }
}

