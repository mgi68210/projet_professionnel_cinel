<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reponses', function (Blueprint $table) {
            $table->id(); 
            $table->uuid('id_utilisateur'); 
            $table->uuid('id_question');
            $table->text('reponse_choisie')->nullable();
            $table->boolean('reponse_bonne_fausse')->default(false);
            $table->timestamps();

            $table->foreign('id_utilisateur')->references('id_utilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('id_question')->references('id_question')->on('questions')->onDelete('cascade');
        
        
            $table->unique(['id_utilisateur', 'id_question']);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reponses');
    }
};
