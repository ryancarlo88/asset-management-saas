<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMutationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_mutations', function (Blueprint $table) {
            $table->foreignId('mutations_id');
            $table->foreign('mutations_id')
                ->references('id')
                ->on('mutations');
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
        Schema::dropIfExists('detail_mutations');
    }
}
