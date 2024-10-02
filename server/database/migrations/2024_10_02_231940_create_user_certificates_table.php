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
        Schema::create('user_certificates', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('certificate_id');
            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');

            $table->date('issued_at');
            $table->string('certificate_file')->nullable();

            $table->timestamps();

            $table->index('user_id');
            $table->index('certificate_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_certificates');
    }
};
