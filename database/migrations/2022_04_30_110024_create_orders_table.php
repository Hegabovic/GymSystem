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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pkg_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('gym_id');
            $table->foreign('pkg_id')->references('id')->on('packages');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('gym_id')->references('id')->on('gyms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('orders');
    // }
};
