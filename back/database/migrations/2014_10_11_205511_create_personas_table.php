<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('fullName');
            $table->string('cedula'); 
            $table->string('phone'); 
            $table->string('earnings_month')->nullable(); 
            $table->date('date');
            $table->string('direction')->nullable(); 
            //$table->unsignedBigInteger('condominium_id')->nullable();
            $table->timestamps();
            //$table->foreign('condominium_id')->references('id')->on('condominium')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}