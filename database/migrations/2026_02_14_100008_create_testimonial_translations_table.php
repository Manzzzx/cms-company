<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonial_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('testimonial_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 5);
            $table->text('message')->nullable();
            $table->timestamps();

            $table->unique(['testimonial_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonial_translations');
    }
};
