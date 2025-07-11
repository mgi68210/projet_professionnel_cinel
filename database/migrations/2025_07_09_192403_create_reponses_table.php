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
        Schema::create('reponses', function (Blueprint $table) {
            $table->uuid('id_utilisateur');
            $table->uuid('id_question');
            $table->text('reponse_choisie');
            $table->boolean('reponse_bonne_fausse');
            $table->timestamps();

            $table->primary(['id_utilisateur', 'id_question']);

            $table->foreign('id_utilisateur')->references('id_utilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('id_question')->references('id_question')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponses');
    }
};
