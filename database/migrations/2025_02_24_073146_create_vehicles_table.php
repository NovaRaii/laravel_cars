<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->unsignedBigInteger('maker_id');
            $table->foreign('maker_id')->references('id')->on('makers');

            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('models');

            $table->unsignedBigInteger('fuel_id');
            $table->foreign('fuel_id')->references('id')->on('fuels');

            $table->unsignedBigInteger('body_id');
            $table->foreign('body_id')->references('id')->on('bodies');

            $table->string('VIN')->index();

            $table->string('Reg_Plate')->index();
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
        Schema::dropIfExists('vehicles');
    }
};
