<?php


use Illuminate\Support\Facades\Route;
use Modules\Album\Http\Controllers\AlbumController;

Route::middleware("auth:sanctum")->group(function (){

    Route::get("list" , [AlbumController::class , 'list']);
    Route::post("create" , [AlbumController::class , 'create']);
    Route::get("show/{album}" , [AlbumController::class , 'show']);
    Route::put("update/{album}" , [AlbumController::class , 'update']);

    Route::get('get-for-select' , [AlbumController::class , 'getForSelect']);
});

