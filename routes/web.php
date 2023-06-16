<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Tasks;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/tasks', function () {
});

Route::get('tasks/completed', [taskController::class, 'completed']);
Route::get('tasks/incomplete', [taskController::class, 'incomplete']);
Route::put('task/{id}/status', [taskController::class, 'updateStatus']);
Route::resource("/tasks",TaskController::class);
// Route::get('/tasks/{id}', [TaskController::class, 'show']);