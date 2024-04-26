<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('successes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('sector_id')->constrained(('sectors'))->onDelete('cascade');
            $table->string('boss_name');
            $table->string('boss_id');
            $table->foreignId('coordination_id')->constrained(('coordinations'))->onDelete('cascade');
            $table->string('coordination_boss_name');
            $table->string('coordination_boss_id');
            $table->foreignId('prisional_unity_id')->constrained(('prisional_unities'))->onDelete('cascade');
            $table->foreignId('faction_id')->constrained(('factions'))->onDelete('cascade');
            $table->foreignId('regime_id')->constrained(('regimes'))->onDelete('cascade');
            $table->string('director_name');
            $table->string('director_id');
            $table->string('subdirector_name');
            $table->string('subdirector_id');
            $table->string('security_boss_name');
            $table->string('security_boss_id');
            $table->string('team_boss_name');
            $table->string('team_boss_id');
            $table->string('ro_number')->nullable();
            $table->string('seal_number')->nullable();
            $table->text('dynamics_of_fact')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('successes');
    }
};
