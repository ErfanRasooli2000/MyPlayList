<?php

use Illuminate\Support\Facades\Route;
use Modules\PanelUser\Http\Controllers\PanelUserController;

Route::post("login" , [PanelUserController::class , 'login']);
Route::get('panelUser/get-data', [PanelUserController::class, 'userData'])->middleware("auth:sanctum");
