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
        Schema::create('music_urls', function (Blueprint $table) {
            $table->id();
            $table->text("url");
            $table->foreignIdFor(\Modules\Song\Models\Song::class , 'song_id')->constrained("songs")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music_urls');
    }
};
