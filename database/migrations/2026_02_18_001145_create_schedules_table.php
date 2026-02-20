<?php
// database/migrations/xxxx_create_schedules_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('division_id')->constrained('divisions')->cascadeOnDelete();
            $table->date('date');
            $table->string('day');
            $table->time('start_time')->default('07:00:00');
            $table->time('end_time')->default('08:00:00');
            $table->string('location');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'completed', 'missed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};