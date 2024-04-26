<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('seizures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prisional_unity_id')->constrained('prisional_unities')->onDelete('cascade');
            $table->foreignId('coordination_id')->constrained('coordinations')->onDelete('cascade');
            $table->date('date');
            $table->foreignId('seizure_type_id')->constrained('seizure_types')->onDelete('cascade');
            $table->string('amount');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('seizures');
    }
};
