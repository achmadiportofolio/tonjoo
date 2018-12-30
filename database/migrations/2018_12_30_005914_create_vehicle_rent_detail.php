<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleRentDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vehicle_rent_detail');
        Schema::create('vehicle_rent_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vehicle_rent_id')->nullable();
            $table->string('group_code')->nullable();
            $table->integer('category_id');
            $table->text('vehicle_rent_detail_transaction_name');
            $table->unsignedBigInteger('vehicle_rent_detail_nominal');
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
        Schema::dropIfExists('vehicle_rent_detail');
    }
}
