<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('prisional_unities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('acronym');
            $table->foreignId('coordination_id')->constrained(('coordinations'))->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prisional_unities');
    }
};
