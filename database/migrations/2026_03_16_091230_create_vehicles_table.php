<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('identify')->nullable();
            $table->foreignId('division_id')->constrained('divisions')->onDelete('cascade');
            $table->string('vehicle_type');
            $table->string('patrimony_type');
            $table->string('brand');
            $table->string('model');
            $table->string('original_plate');
            $table->string('reserved_plate')->nullable();
            $table->string('kilometer');
            $table->string('credential_number');
            $table->boolean('status')->default(1);
            $table->string('disclaimer')->nullable();
            $table->text('observations')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
