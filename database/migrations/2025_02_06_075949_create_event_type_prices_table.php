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
        Schema::create('event_type_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hall_id')->constrained()->onDelete('cascade'); // Lien vers la salle
            $table->foreignId('event_type_id')->constrained()->onDelete('cascade'); // Lien vers le type d'événement
            $table->decimal('price', 8, 2); // Le prix pour ce type d'événement
            $table->unique(['event_type_id', 'hall_id'], 'unique_event_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_type_prices');
    }
};
