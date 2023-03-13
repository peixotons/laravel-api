<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class, 'register']);
Route::post('login',[UserController::class, 'login']);

//Get all tasks
Route::get('tasks',[TasksController::class, 'getTasks']);
//Get specific task detail
Route::get('tasks/{id}',[TasksController::class, 'getTasksById']);
//Add new task 
Route::post('tasks/create',[TasksController::class, 'createTask']);
//Update task
Route::put('tasks/update/{id}',[TasksController::class,'updateTask']);
//Delete task
Route::put('tasks/delete/{id}',[TasksController::class,'deleteTask']);





