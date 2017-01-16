<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_model', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_name')->unique();
            $table->string('description')->nullable();
            $table->string('guarding_required');
            $table->string('guarding_status')->nullable();
            $table->string('safety_pm_status');
            $table->string('lead_battery_acid');
            $table->string('hecp_num');
            $table->string('radiation_status')->nullable();
            $table->string('radiation_type')->nullable();
            $table->string('refrigerant');
            $table->string('refrigerant_type')->nullable();
            $table->string('refrigerant_amount')->nullable();
            //$table->string('measures')->nullable();
            //$table->string('keywords')->nullable();
            $table->string('attachment_file_name')->nullable();
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
        Schema::dropIfExists('equipment_model');
    }
}
