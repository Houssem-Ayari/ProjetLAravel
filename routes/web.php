<?php

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

Route::resource('Menu', 'MenuController');
Route::resource('ItemMenu', 'ItemMenuController');
Route::resource('Order', 'OrderController');
Route::resource('Utilisateur', 'UtilisateurController');
Route::resource('Evaluation', 'EvaluationController');