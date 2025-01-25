<?php

use App\Enums\StatusHallEnum;
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
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('capacity');
            $table->json('location');
            $table->float('price');
            $table->string('image')->nullable();
            $table->string('address');
            $table->enum('status', array_column(StatusHallEnum::cases(), 'value'))->default(StatusHallEnum::AVAILABLE->value);
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('halls');
    }
};
