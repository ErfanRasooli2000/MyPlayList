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
        Schema::create('keyboards', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class , 'user_id')->constrained("users")->cascadeOnDelete();
            $table->string("message_id");
            $table->enum("type" , \Modules\Keyboard\Enums\KeyboardTypeEnum::values());
            $table->text("data");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keyboards');
    }
};
