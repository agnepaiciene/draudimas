<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id('id')->autoIncrement()->unsigned();
            $table->string("reg_number", 20);
            $table->string("brand", 32);
            $table->string("model", 32);

//            $table->unsignedInteger('owner_id'); // first this
//            $table->foreign('owner_id')->references('id')->on('owners'); // then this

            $table->integer('owner_id')->nullable();
//
//            $table->timestamps();
//
            $table->foreign('owner_id')->references('id')->on('owners');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
