<?php

use Illuminate\Support\Facades\Route;
use Modules\Song\Http\Controllers\SongController;

Route::middleware("auth:sanctum")->group(function (){

    Route::get("list" ,[SongController::class , 'list']);
    Route::post("create" , [SongController::class , 'create']);
    Route::get("show/{song}" , [SongController::class , 'show']);
});
