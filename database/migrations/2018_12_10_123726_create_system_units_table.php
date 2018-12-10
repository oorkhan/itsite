<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpu');
            $table->float('ram');
            $table->integer('hdd');
            $table->string('video_adapter');
            $table->string('motherboard');
            $table->string('form_factor');
            $table->integer('equipment_id');
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
        Schema::dropIfExists('system_units');
    }
}
