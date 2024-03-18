<?php

use App\Http\Controllers\WebHookController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::match(['get' , 'post'] , '/' , [WebHookController::class , 'receive'])->withoutMiddleware(VerifyCsrfToken::class);

Route::get("/testy" , function (){

});
