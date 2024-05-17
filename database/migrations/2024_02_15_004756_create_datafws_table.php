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
        Schema::create('datafws', function (Blueprint $table) {
            $table->id();
            $table->string('week_number');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->string('nh_budget');
            $table->string('nh_actual');
            $table->string('efficience_budget');
            $table->string('efficience_actual');
            $table->timestamps();  });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datafws');
    }
};
