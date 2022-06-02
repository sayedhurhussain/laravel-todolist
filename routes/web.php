<?php

use Illuminate\Support\Facades\Route;

// inport the controller---
use App\Http\Controllers\TodoListController;

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

// By Default Route---
// '/' means the url hit ---
//     Route::get('/', function () {
//         return view('welcome');
//     });

// Start Coding---

// Before Controller Coding---
    // Route::post('/saveItemRoute', function () {
    //     return view('welcome');
    // })->name('saveItem');

    //change default to return list item using controller---
    Route::get('/', [TodoListController::class, 'index']);

// TodoListController hit the saveItem method when saveItemRouter is hit---
Route::post('/saveItemRoute', [TodoListController::class, 'saveItem'])->name('saveItem');
 
// TodoListController hit the markComplete method when markCompleteRouter is hit---
Route::post('/markCompleteRoute/{id}', [TodoListController::class, 'markComplete'])->name('markComplete');

// End Coding---