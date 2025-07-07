<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {
            $table->uuid('id_quiz')->primary();
            $table->string('type', 50);
            $table->text('texte_question');
            $table->text('texte_reponse'); 
            $table->uuid('id_cours')->nullable(); // 
            $table->foreign('id_cours')->references('id_cours')->on('cours')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz');
    }
};

