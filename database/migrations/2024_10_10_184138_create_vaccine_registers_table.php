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
        Schema::create('vaccine_registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('center_id')->constrained('vaccine_centers')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nid', 20)->unique();
            $table->date('scheduled_date')->nullable();
            $table->enum('registration_status', ['SCHEDULED', 'VACCINATED'])->default('SCHEDULED');
            $table->index(['name', 'email', 'nid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccine_registers');
    }
};
