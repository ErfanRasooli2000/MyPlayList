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
        Schema::create('playlists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(\App\Models\User::class , 'created_by')->nullable()->constrained("users")->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('playlist-user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class , 'user_id')->constrained("users")->cascadeOnDelete();
            $table->foreignIdFor(\Modules\PlayList\Models\Playlist::class , 'playlist_id')->constrained("playlists")->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlists');
    }
};
