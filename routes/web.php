<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\GamePlayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'home'])->name('home');

    Route::group(['middleware' => ['role:user']], function () { 
        Route::get('dashboard', [HomeController::class, 'userDashboard'])->name('user.dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('create/games', [GameController::class, 'create'])->name('create.game');
        Route::post('store/games', [GameController::class, 'store'])->name('store.game');
        Route::get('create/questions/{id}', [GameController::class, 'createQuestion']);
        Route::get('publish/game/{id}', [GameController::class, 'publishGame']);
        Route::post('store/questions', [GameController::class, 'storeQuestion'])->name('store.question');
        Route::get('my/games', [GameController::class, 'myGames'])->name('my.games');

        Route::get('game/instruction/{id}', [GamePlayController::class, 'instruction']);
    });


    Route::group(['middleware' => ['role:admin']], function () { 
        Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
     });

     
   
   
   

});

require __DIR__.'/auth.php';
