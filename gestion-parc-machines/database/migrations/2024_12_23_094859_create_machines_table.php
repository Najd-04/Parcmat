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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agence_id')->constrained('agences');
            $table->foreignId('modele_id')->constrained('modeles');
            $table->foreignId('type_machine_id')->constrained('type_machines');
            $table->string('numero_serie')->unique();
            $table->text('detail_appareil')->nullable();
            $table->text('commentaire')->nullable();
            $table->string('localisation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
