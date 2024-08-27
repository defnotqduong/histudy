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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('title');
            $table->string('slug')->unique();
            $table->longText('summary')->nullable();
            $table->longText('description')->nullable();
            $table->longText('thumb_url')->nullable();
            $table->longText('thumb_public_id')->nullable();
            $table->float('price')->nullable();
            $table->boolean('is_published')->default(false);

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps();

            $table->index(['user_id', 'slug', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
