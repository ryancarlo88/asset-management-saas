<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVendorToSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('detail_schedules', function (Blueprint $table) {
        //     $table->integer('vendors_id')->unsigned();
        // });

        Schema::table('schedules', function (Blueprint $table) {
            $table->bigInteger('vendors_id')->nullable()->unsigned();
            $table->foreign('vendors_id')
                ->references('id')
                ->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_schedules', function (Blueprint $table) {
        });
    }
}
