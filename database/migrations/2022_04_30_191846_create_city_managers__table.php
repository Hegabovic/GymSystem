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
        Schema::create('city_managers', function (Blueprint $table) {
           // $table->id();
            $table->unsignedBigInteger('city_manager_id');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_manager_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->primary('city_manager_id');
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
        Schema::dropIfExists('city_managers_');
    }
};
