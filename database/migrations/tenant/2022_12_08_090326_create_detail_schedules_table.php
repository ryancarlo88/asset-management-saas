<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_schedules', function (Blueprint $table) {
            $table->foreignId('schedules_id');
            $table->foreign('schedules_id')
                ->references('id')
                ->on('schedules');
            $table->foreignId('fixed_assets_id');
            $table->foreign('fixed_assets_id')
                ->references('id')
                ->on('fixed_assets');
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
        Schema::dropIfExists('detail_schedules');
    }
}
