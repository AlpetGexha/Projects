<?php

use App\Http\Controllers\MarkAsCompletedController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\TodoController as ControllersTodoController;
use App\Models\Todo;
use Illuminate\Http\Request;
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
    return redirect(route('todos.index'));
});


Route::resource('/todos', ToDoController::class);
Route::put('/todo/{todo}/completed', MarkAsCompletedController::class)->name('todos.completed');



Route::get('/search', function (Request $request) {
    return Todo::search($request->search)->get();
});
