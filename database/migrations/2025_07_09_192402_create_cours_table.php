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
        Schema::create('cours', function (Blueprint $table) {
            $table->uuid('id_cours')->primary();
            $table->string('titre',100);
            $table->text('description')->nullable();
            $table->string('tranche_age',50)->nullable();
            $table->integer('capacite_max')->nullable();
            $table->dateTime('date_heure')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
