<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMarkLocationColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Equipment_Item', function($table){
            $table->dropColumn('mark_location');
        });
        Schema::table('Lab', function($table){
            $table->timestamp('mark_location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Lab', function($table){
            $table->dropColumn('mark_location');
        });
    }
}
