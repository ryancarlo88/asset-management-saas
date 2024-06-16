<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slocation');
            $table->foreign('slocation')
                ->references('id')
                ->on('locations');
            $table->unsignedBigInteger('tlocation');
            $table->foreign('tlocation')
                ->references('id')
                ->on('locations');
            $table->foreignId('receiver');
            $table->foreign('receiver')
                ->references('id')
                ->on('peoples');
            $table->date('date');
            $table->text('notes');
            $table->enum('status', ['Validated', 'Cancelled'])->nullable();
            $table->text('reason')->nullable();
            $table->foreignId('users_id');
            $table->foreign('users_id')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('mutations');
    }
}
