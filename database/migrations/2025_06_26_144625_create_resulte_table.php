<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('resulte', function (Blueprint $table) {
            $table->uuid('id_cours');
            $table->uuid('id_quiz');
            $table->timestamps();

            $table->primary(['id_cours', 'id_quiz']);

            $table->foreign('id_cours')->references('id_cours')->on('cours')->onDelete('cascade');
            $table->foreign('id_quiz')->references('id_quiz')->on('quiz')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('resulte');
    }
};
