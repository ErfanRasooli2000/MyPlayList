<?php

namespace App\Services;
class SearchService
{
    public function search($text)
    {
        return \Modules\Song\Models\Song::query()
            ->with("url")
            ->whereAny([
                "name_en",
                "name_fa",
            ] , "LIKE" , "%".$text."%")
            ->first();
    }
}
