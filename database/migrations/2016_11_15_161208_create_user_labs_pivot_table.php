<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLabsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             Schema::create('User_Labs', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            //$table->foreign('model_id')->references('id')->on('equipment_model')->ondelete('cascade');
            $table->integer('lab_id')->unsigned()->index();
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
        Schema::drop('User_Labs');
    }
}
