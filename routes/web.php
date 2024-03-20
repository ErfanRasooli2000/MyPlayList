<?php

use App\Http\Controllers\WebHookController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::match(['get' , 'post'] , '/' , [WebHookController::class , 'receive'])->withoutMiddleware(VerifyCsrfToken::class);

Route::get("/testy" , function (){

    $text = "shayea";

    $ali = null;

    $data = \Modules\Song\Models\Song::whereHas("artists" , function ($query) use ($text){
        $query->whereAny([
            "name_en",
            "name_fa",
        ] , "LIKE" , "%".$text."%");
    })->get();



    dd($data);
});
