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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string("name_fa")->nullable();
            $table->string("name_en")->nullable();
            $table->string("file_id")->nullable();
            $table->foreignIdFor(\Modules\Album\Models\Album::class , 'album_id')->nullable()->constrained("albums")->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('song-artist', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\Modules\Song\Models\Song::class , 'song_id')->constrained("songs")->cascadeOnDelete();
            $table->foreignIdFor(\Modules\Artist\Models\Artist::class , 'artist_id')->constrained("artists")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
        Schema::dropIfExists('song-artist');
    }
};
