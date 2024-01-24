<?php

use App\Http\Controllers\HoursController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

# Get all projects
Route::get('/projects', [ProjectController::class, "index"])->name('projects');

# Create a new project
Route::get('/projects/create', [ProjectController::class, "create"])->name('projects.create');
Route::post('/projects/store', [ProjectController::class, "store"])->name('projects.store');

# Edit a current project by changing it's name or description
Route::get('/projects/{id}/edit', [ProjectController::class, "edit"])->name('projects.edit');
Route::post('/projects/{id}/edit', [ProjectController::class, "update"])->name('projects.update');

# All posts for adding new logs and hours
Route::post('/projects/{id}/logs', [LogsController::class, "logs"])->name('projects.logs');
Route::post('/projects/{id}/hours', [HoursController::class, "hours"])->name('projects.hours');

# Show a certain project
Route::get('/projects/{id}', [ProjectController::class, "show"])->name('projects.show');


#Route::get('/', function () {
#    return view('index');
#});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
