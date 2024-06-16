<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->integer('cost');
            $table->integer('res_value');
            $table->double('drate');
            $table->integer('year');
            $table->string('location')->nullable();
            $table->enum('status', ['On Procurement', 'Assigned', 'Disposed']);
            $table->text('desc');
            $table->foreignId('users_id');
            $table->foreign('users_id')
                ->references('id')
                ->on('users');
            $table->foreignId('categories_id');
            $table->foreign('categories_id')
                ->references('id')
                ->on('asset_categories');


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
        Schema::dropIfExists('fixed_assets');
    }
}
