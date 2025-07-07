<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('reserver', function (Blueprint $table) {
            $table->uuid('id_utilisateur');
            $table->uuid('id_cours');
            $table->dateTime('date_reservation')->nullable();
            $table->string('statut', 50)->nullable();
            $table->timestamps();

            $table->primary(['id_utilisateur', 'id_cours']);

            $table->foreign('id_utilisateur')->references('id_utilisateur')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('id_cours')->references('id_cours')->on('cours')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('reserver');
    }
};
