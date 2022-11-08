<?php
use App\Http\Controllers\inventory_controller;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/inventory', function () {
    return view('inventory');
})->middleware(['auth', 'verified'])->name('inventory');

require __DIR__.'/auth.php';

//displaydata routes dashboard
Route::get('/dashboard',[inventory_controller::class, 'displaydata'])->middleware(['auth', 'verified'])->name('dashboard');

//displaydata routes for inventory
Route::get('/inventory',[inventory_controller::class, 'displayinventory'])->middleware(['auth', 'verified'])->name('inventory');

//addinvetory routes for inventory
Route::get('/additem',[inventory_controller::class, 'additem']);
Route::post('Additems',[inventory_controller::class, 'addinventory']);

//edit routes   for inventory
Route::get('Delete/{id}',[inventory_controller::class, 'delete_inventory']);

//edit inventories routes
Route::get('Update/{id}',[inventory_controller::class,'display_update']);
Route::post('update_inventory',[inventory_controller::class, 'update_inventory']);

//search control Route
Route::get('Search',[inventory_controller::class,'Search']);