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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizzas', function() {
    // We can create a variable to store data and return it
    $pizzas = [
        'type' => 'Pizza Việt Nam',
        'ingredients' => 'Cheese',
        'price' => 40000
    ];
    return view('pizzas', $pizzas);
});