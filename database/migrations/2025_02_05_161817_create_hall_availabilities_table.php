<?php

use App\Enums\StatusAvailabilityEnum;
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
        Schema::create('hall_availabilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hall_id'); // Référence à la table halls
            $table->dateTime('start_date'); // Date et heure de début de disponibilité
            $table->dateTime('end_date'); // Date et heure de fin de disponibilité
            $table->enum('status', array_column(StatusAvailabilityEnum::cases(), 'value'))->default(StatusAvailabilityEnum::AVAILABLE->value);
            $table->foreign('hall_id')->references('id')->on('halls')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hall_availabilities');
    }
};
