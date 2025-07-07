<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('message', function (Blueprint $table) {
            $table->uuid('id_message')->primary(); 
            $table->uuid('id_utilisateur');        
            $table->text('objet')->nullable();
            $table->text('contenu')->nullable();
            $table->dateTime('date_envoi')->nullable();
            $table->string('statut', 20)->nullable();
            $table->timestamps();

            $table->foreign('id_utilisateur')
                ->references('id_utilisateur')
                ->on('utilisateurs')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};

