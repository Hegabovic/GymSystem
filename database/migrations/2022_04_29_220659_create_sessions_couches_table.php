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
        Schema::create('sessions_couches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('couch_id');
            $table->unsignedBigInteger('session_id');
            $table->foreign('couch_id')->references('id')->on('couches');
            $table->foreign('session_id')->references('id')->on('training_sessions');
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
        Schema::dropIfExists('sessions_couches');
    }
};
