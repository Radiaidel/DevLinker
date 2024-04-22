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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clé étrangère de l'utilisateur qui a effectué le signalement
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Clé étrangère du projet signalé
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // Statut du rapport
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
