<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vehicle_rent');
        Schema::create('vehicle_rent', function (Blueprint $table) {
            $table->increments('id');
            $table->text('vehicle_rent_description');
            $table->text('vehicle_rent_code');
            $table->unsignedBigInteger('vehicle_rent_rate');
            $table->dateTime('vehicle_rent_date');
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
        Schema::dropIfExists('vehicle_rent');
    }
}
