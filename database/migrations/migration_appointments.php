<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            // Infos patient
            $table->string('patient_name');          // nom + prénom combinés
            $table->string('patient_firstname')->nullable(); // prénom séparé
            $table->string('patient_phone');
            $table->unsignedInteger('age')->nullable();

            // RDV
            $table->string('service');
            $table->date('date');
            $table->time('time');

            // Statut — EN ATTENTE par défaut
            $table->enum('statut', [
                'en_attente',   // vient d'être soumis
                'confirme',     // validé par le dentiste
                'annule',       // annulé
                'termine'       // consultation faite
            ])->default('en_attente');

            // Note du dentiste (motif annulation etc.)
            $table->text('note')->nullable();

            $table->timestamps();
        });

        // Table jours bloqués (congés, fériés)
        Schema::create('blocked_dates', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->string('raison')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('blocked_dates');
    }
};
