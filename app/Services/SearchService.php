<?php

namespace App\Services;
use Modules\Song\Models\Song;

class SearchService
{
    public function search($text)
    {
        return Song::with("url")
            ->where(function ($query) use ($text){
                $query->whereAny([
                    "name_en",
                    "name_fa",
                ] , "LIKE" , "%".$text."%");
            })
            ->orWhere(function ($query) use ($text){
                $query->whereHas("artists" , function ($q) use ($text) {
                    $q->whereAny([
                        "name_en",
                        "name_fa",
                    ], "LIKE", "%" . $text . "%");
                });
            })
            ->limit(5)
            ->get();
    }
}
