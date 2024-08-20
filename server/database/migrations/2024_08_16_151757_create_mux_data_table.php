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
        Schema::create('mux_data', function (Blueprint $table) {
            $table->id();
            $table->string('asset_id');
            $table->string('playback_id')->nullable();

            $table->unsignedBigInteger('chapter_id')->unique();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');

            $table->timestamps();

            $table->index('chapter_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mux_data');
    }
};
