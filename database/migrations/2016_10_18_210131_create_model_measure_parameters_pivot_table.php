<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelMeasureParametersPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Model_MeasureParameters', function (Blueprint $table) {
            $table->integer('model_id')->unsigned()->index();
            //$table->foreign('model_id')->references('id')->on('equipment_model')->ondelete('cascade');
            $table->integer('parameter_id')->unsigned()->index();
            //$table->foreign('parameter_id')->references('id')->on('measure_parameters')->ondelete('cascade');
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
        Schema::drop('Model_MeasureParameters');
    }
}
