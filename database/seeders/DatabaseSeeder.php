<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Artist\Database\Seeders\ArtistSeeder;
use Modules\Song\Database\Seeders\SongSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ArtistSeeder::class,
            SongSeeder::class,
        ]);
    }
}
