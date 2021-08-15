<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/programs',[ProgramController::class,'index'])->name('api.programs');

Route::post('/programs/store',[ProgramController::class,'store'])->name('api.programs.store');

Route::put('/programs/update/{id}',[ProgramController::class,'update'])->name('api.programs.update');

Route::delete('/programs/delete/{id}',[ProgramController::class,'destroy'])->name('api.programs.delete');
