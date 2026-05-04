<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('food_tags', function (Blueprint $table) {
            $table->foreignId('food_id')
                  ->constrained('foods')
                  ->onDelete('cascade');
            $table->foreignId('tag_id')
                  ->constrained('tags')
                  ->cascadeOnDelete();
            $table->primary(['food_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('food_tags');
    }
};
