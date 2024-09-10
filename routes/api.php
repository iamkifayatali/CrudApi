<?php

use App\Http\Controllers\apicontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('get', [apicontroller::class,'index']);
Route::post('post', [apicontroller::class, 'store']);
Route::delete('delete/{id}', [apicontroller::class, 'destroy']);
