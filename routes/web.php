<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/api_ex', array('middleware' => 'cors', 'uses' => function () {
    $rArray = [];
    $rArray['author'] = 'svelte2 API testing against Laravel backend';
    $rArray['version'] = 'v0.1.5';
    return $rArray;
}));
Route::get('/', function () {
    return view('welcome');
});
