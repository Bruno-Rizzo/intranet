<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('administratives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('identify');
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade');
            $table->string('address');
            $table->string('complement');
            $table->string('county');
            $table->string('city');
            $table->string('phone');
            $table->string('email');
            $table->string('cpf');
            $table->string('rg');
            $table->date('birth');
            $table->date('entry');
            $table->foreignId('matrial_id')->constrained('matrials')->onDelete('cascade');
            $table->text('observations')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('administratives');
    }
};
