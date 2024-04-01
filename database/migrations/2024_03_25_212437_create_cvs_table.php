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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complet');
            $table->string('email', 191)->unique();
            $table->string('numero_telephone');
            $table->string('poste_actuel');
            $table->string('entreprise_actuelle');
            $table->integer('annees_experience');
            $table->string('dernier_diplome');
            $table->string('domaine_etudes');
            $table->text('competences');
            $table->string('cv_filename');
            $table->text('motivation')->nullable();
            $table->text('disponibilites_entretien')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
