<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->uuid('id_admin')->primary();
            $table->string('nom',50);
            $table->string('prenom',50);
            $table->string('email',100)->unique();
            $table->string('mot_de_passe',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
};
