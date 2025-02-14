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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_type'); // Type d'événement (mariage, anniversaire, etc.)
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('details'); // Détails de la demande
            $table->boolean('status')->default(0);
            $table->decimal('amount', 10, 2);
            $table->unsignedBigInteger('user_id'); // L'utilisateur qui a créé l'événement
            $table->unsignedBigInteger('hall_id'); // L'identifiant de la salle réservée
            $table->timestamps();

            // Contrainte de clé étrangère
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('hall_id')->references('id')->on('halls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
