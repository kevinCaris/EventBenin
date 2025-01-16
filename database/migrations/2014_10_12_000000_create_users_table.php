<?php

use App\Enums\GenderEnum;
use App\Enums\RoleEnum;
use App\Enums\StatusProprietorEnum;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();

            $table->string('firstname');
            $table->string('lastname');

            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();

            $table->string('avatar')->nullable();
            $table->enum('gender', array_column(GenderEnum::cases(), 'value'))->default(GenderEnum::MALE->value);

            $table->enum('role', array_column(RoleEnum::cases(), 'value'))->default(RoleEnum::CLIENT->value);
            $table->enum('status_proprietor', array_column(StatusProprietorEnum::cases(), 'value'))->default(StatusProprietorEnum::PENDING->value);

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
