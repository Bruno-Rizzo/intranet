<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('acautions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('administrative_id')->constrained('administratives')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->string('brand');
            $table->string('model');
            $table->string('caliber');
            $table->string('number');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('acautions');
    }
};
