<?php


use Illuminate\Support\Facades\Route;
use Modules\Artist\Http\Controllers\ArtistController;

Route::middleware("auth:sanctum")->group(function (){

    Route::get("list" , [ArtistController::class , 'list']);
    Route::post("create" , [ArtistController::class , 'create']);
    Route::get("show/{artist}" , [ArtistController::class , 'show']);
    Route::put("update/{artist}" , [ArtistController::class , 'update']);

});
