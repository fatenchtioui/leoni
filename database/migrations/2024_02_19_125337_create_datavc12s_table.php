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
        Schema::create('datavc12s', function (Blueprint $table) {
            $table->id();
            $table->string('hc_direct');
            $table->string('hc_indirect');
            $table->string('abs_p');
            $table->string('abs_np');
            $table->string('fluctuation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datavc12s');
    }
};