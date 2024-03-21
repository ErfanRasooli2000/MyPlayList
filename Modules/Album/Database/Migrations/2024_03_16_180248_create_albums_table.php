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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string("name_fa")->nullable();
            $table->string("name_en")->nullable();
            $table->timestamps();
        });

        Schema::create("album-artist" , function (Blueprint $table){
            $table->id();
            $table->foreignIdFor(\Modules\Artist\Models\Artist::class , 'artist_id')->constrained("artists");
            $table->foreignIdFor(\Modules\Album\Models\Album::class , 'album_id')->constrained("albums");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
