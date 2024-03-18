<?php

namespace Modules\Artist\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Artist\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name_fa" => "دانیال",
                "name_en" => "Danyial",
            ],
            [
                "name_fa" => "علی سورنا",
                "name_en" => "Ali Sorena",
            ],
            [
                "name_fa" => "محسن یگانه",
                "name_en" => "Mohsen Yeganeh",
            ],
            [
                "name_fa" => "محمد رضا شایع",
                "name_en" => "Shayea",
            ],
            [
                "name_fa" => "ماکان بند",
                "name_en" => "Macan Band",
            ],
            [
                "name_fa" => "تیلور سویفت",
                "name_en" => "Taylor Swift",
            ],
            [
                "name_fa" => "تانیا",
                "name_en" => "Taniya",
            ],
            [
                "name_fa" => "رضا پیشرو",
                "name_en" => "Reza Pishro",
            ],
            [
                "name_fa" => "مهیار",
                "name_en" => "Mahyar",
            ],
            [
                "name_fa" => "بهرام نورایی",
                "name_en" => "Bahram Nouraei",
            ],
            [
                "name_fa" => "جاستینا",
                "name_en" => "Justina",
            ],
            [
                "name_fa" => "تی دی",
                "name_en" => "T-Dey",
            ],

        ];

        Artist::insert($data);
    }
}
