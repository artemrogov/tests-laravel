<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contacts',function(){
   return  'test2';
});

Route::get('/test3',function(){
  return 'test3';
});


Route::get('/login-test',function(){
  if(Auth::check()){
    return response()->json('auth user',200);
  }else {
    return response()->json('not auth',401);
  }
});


Route::get('settings',fn()=>view('test_view'));
