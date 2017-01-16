<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id')->unsigned()->index();
            $table->string('manufacturer')->nullable();
            $table->string('serial_num')->nullable();
            $table->string('asset_tag')->nullable();
            $table->string('workstation_num')->nullable();
            $table->string('owned_by_lab_id');
            $table->string('current_location_id');
            $table->string('calibration_tag')->nullable();
            $table->string('calibration_due')->nullable();
            $table->string('calibration_schedule')->nullable();
            $table->string('available')->nullable();
            $table->string('off_site')->nullable();
            $table->string('off_site_location')->nullable();
            $table->string('qualified')->nullable();
            $table->string('notes')->nullable();
            $table->string('entered_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_item');
    }
}
