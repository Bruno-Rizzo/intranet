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
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade');
            $table->foreignId('matrial_id')->constrained('matrials')->onDelete('cascade');
            $table->string('name');
            $table->string('identify');
            $table->string('photo');
            $table->string('address');
            $table->string('number');
            $table->string('complement');
            $table->string('neighborhood');
            $table->string('county');
            $table->string('city');
            $table->string('email');
            $table->string('phone');
            $table->string('cpf');
            $table->string('rg');
            $table->date('birth');
            $table->date('entry');
            $table->text('observations');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('administratives');
    }
};
