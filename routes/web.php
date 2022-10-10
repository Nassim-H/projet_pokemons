<?php

use App\Http\Controllers\PokemonController;
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
})->name('home');;

Route::get('/apropos', function () {
    return view('welcome');
})->name('apropos');;

Route::get('/contacts', function () {
    return view('welcome');
})->name('contacts');;


Route::get('/pokemons', [PokemonController::class,'index'])->name('pokemons.html');


//Route::get('/pokemons', [TacheController::class, 'index'])->name('pokemons.index');
Route::resource('pokemons', PokemonController::class)->except('index');
Route::get('/pokemons', [PokemonController::class, 'indexCookie'])->name('pokemons.index');
Route::post('/pokemons/{id}/upload', [PokemonController::class, 'upload'])->name('pokemons.upload');



Route::get('/pokemonsi', [PokemonController::class, 'indexCookie1']);
Route::get('/pokemons/{tach}', [PokemonController::class, 'show'])->name('pokemons.show');
Route::get('/pokemons/{tache}/edit', [PokemonController::class, 'edit'])->name('pokemons.edit');
Route::delete('/pokemons/{tach}/', [PokemonController::class, 'destroy'])->name('pokemons.destroy');
Route::get('/pokemons/{tache}/edit', [PokemonController::class, 'edit'])->name('pokemons.edit');
Route::delete('/pokemons/{tach}/', [PokemonController::class, 'destroy'])->name('pokemons.destroy');


require __DIR__.'/auth.php';


Route::get('/dashboard', function () {
    return view('dashboard', ['titre'=>'Admin']);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/pokemons', PokemonController::class)->except('index');
    Route::get('/pokemons', [PokemonController::class, 'indexCookie'])->name('pokemons.index');
    Route::post('pokemons/{id}/upload', [PokemonController::class, 'upload'])->name('pokemons.upload');
});
