<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('home', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('teams', TeamController::class);
Route::resource('players', PlayerController::class);
Route::resource('events', EventController::class);
Route::resource('matches', MatchController::class);
Route::resource('results', ResultController::class);
Route::get('/results/create/{match}', [ResultController::class, 'create'])->name('results.create');


require __DIR__ . '/auth.php';
