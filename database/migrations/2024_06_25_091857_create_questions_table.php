<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('title')->nullable();
            $table->string('short_title')->nullable();
            $table->string('tag')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_used')->default(true);
            $table->boolean('is_map_support')->default(false);
            $table->foreignUuid('keyword_id')->nullable()->constrained();
            $table->foreignUuid('theme_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
