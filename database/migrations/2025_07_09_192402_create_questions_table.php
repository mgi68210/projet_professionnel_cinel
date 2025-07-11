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
        Schema::create('questions', function (Blueprint $table) {
            $table->uuid('id_question')->primary();
            $table->string('type', 25);
            $table->text('texte_question');
            $table->text('texte_reponse');
            $table->uuid('id_cours');
            $table->timestamps();

            $table->foreign('id_cours')->references('id_cours')->on('cours')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
