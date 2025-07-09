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
        Schema::create('reserver', function (Blueprint $table) {
            $table->uuid('id_utilisateur');
            $table->uuid('id_cours');
            $table->date('date_reservation');
            $table->string('statut', 50)->nullable();
            $table->primary(['id_utilisateur', 'id_cours']);
            $table->timestamps();

            $table->foreign('id_utilisateur')->references('id_utilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('id_cours')->references('id_cours')->on('cours')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserver');
    }
};
