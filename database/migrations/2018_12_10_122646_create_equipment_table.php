<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_no')->nullable();
            $table->string('inventar_no')->nullable();
            $table->integer('room_id')->nullable();
            $table->integer('repaires_id')->nullable();
            $table->float('price')->nullable();    
            $table->date('date_of_purchase')->nullable();
            $table->string('status');
            $table->string('model');
            $table->integer('employee_id')->nullable();
            $table->integer('EquipmentType_id');
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
        Schema::dropIfExists('equipment');
    }
}
