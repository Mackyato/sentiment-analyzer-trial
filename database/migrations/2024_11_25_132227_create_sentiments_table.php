<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sentiments', function (Blueprint $table) {
            $table->id();
            $table->text('text'); // Text analyzed
            $table->integer('positive_count')->default(0); // Positive word count
            $table->integer('negative_count')->default(0); // Negative word count
            $table->integer('neutral_count')->default(0); // Neutral word count
            $table->json('positive_words')->nullable(); // Positive words (JSON)
            $table->json('negative_words')->nullable(); // Negative words (JSON)
            $table->json('neutral_words')->nullable(); // Neutral words (JSON)
            $table->timestamps(); // Created_at and Updated_at columns
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentiments');
    }
};
