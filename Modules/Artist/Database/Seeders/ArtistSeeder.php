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
            [
                "name_fa" => "امیر تتلو",
                "name_en" => "Amir Tataloo",
            ],
            [
                "name_fa" => "یاس",
                "name_en" => "yas",
            ],
            [
                "name_fa" => "کورش",
                "name_en" => "Koorosh",
            ],
            [
                "name_fa" => null,
                "name_en" => "021kid",
            ],
            [
                "name_fa" => "سمی لو",
                "name_en" => "Sami Low",
            ],
            [
                "name_fa" => "آرتا",
                "name_en" => "Arta",
            ],
            [
                "name_fa" => "آرون",
                "name_en" => "Arown",
            ],
            [
                "name_fa" => "بنجی",
                "name_en" => "Benji",
            ],
            [
                "name_fa" => "بهزاد لیتو",
                "name_en" => "Behzad Leito",
            ],
            [
                "name_fa" => "کچی بیتز",
                "name_en" => "Catchybeatz",
            ],
            [
                "name_fa" => "رها",
                "name_en" => "Raha",
            ],
            [
                "name_fa" => "سیجل",
                "name_en" => "Sijal",
            ],
            [
                "name_fa" => "تمارا",
                "name_en" => "Tamara",
            ],
            [
                "name_fa" => null,
                "name_en" => "Scott Storch",
            ],
            [
                "name_fa" => "سهراب ام جی",
                "name_en" => "Sohrab Mj",
            ],
            [
                "name_fa" => "سپهر خلسه",
                "name_en" => "Sepehr Khalse",
            ],
            [
                "name_fa" => "پندار",
                "name_en" => "Pendar",
            ],
        ];

        Artist::insert($data);
    }
}
