<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendence', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('gym_id');
            $table->unsignedBigInteger('training_session_id');
            $table->foreign('customer_id')->references('id')->on('customers'); ##instead of above line
            $table->foreign('gym_id')->references('id')->on('gyms');
            $table->foreign('training_session_id')->references('id')->on('training_sessions');
            $table->timestamps();
        });
    }
};
