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
        Schema::create('accessoires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_id')->nullable()->constrained('machines')->onDelete('set null');
            $table->foreignId('modele_id')->constrained('modeles');
            $table->foreignId('type_accessoire_id')->constrained('type_accessoires');
            $table->string('numero_serie')->unique();
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('accessoires');
    }
};
