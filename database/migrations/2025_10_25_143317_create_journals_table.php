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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('abstract');
            $table->string('authors')->nullable();
            $table->year('year')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('keywords')->nullable();
            $table->string('file_path')->nullable();
            $table->integer('file_size')->nullable();
            $table->foreignId('uploaded_by')->constrained('users')->cascadeOnDelete();
            $table->enum('status', ['draft', 'published', 'rejected'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            
            // Add fulltext index for search
            $table->fullText(['title', 'abstract', 'authors', 'keywords']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
