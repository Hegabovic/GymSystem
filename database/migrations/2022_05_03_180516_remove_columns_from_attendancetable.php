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
        if (Schema::hasColumn('posts', 'body')){

  

            Schema::table('attendance', function (Blueprint $table) {

                $table->dropColumn('attendance_time');
                $table->dropColumn('attendance_date');
            });

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendancetable', function (Blueprint $table) {
            //
        });
    }
};
