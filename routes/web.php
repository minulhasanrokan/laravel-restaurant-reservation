<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ResarvationController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\WelcomeController;



Route::get('/', [WelcomeController::class, 'index']);
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('/dashboard', [AdminController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/menus',MenuController::class);
    Route::resource('/tables',TableController::class);
    Route::resource('/resarvations',ResarvationController::class);

    Route::get('/delete.category/{category}',[CategoryController::class,'delete_category'])->name('delete.category');
    Route::get('/categories.change.status/{category}',[CategoryController::class,'change_category_status'])->name('categories.change.status');

    Route::get('/delete.menu/{menu}',[MenuController::class,'delete_menu'])->name('delete.menu');
    Route::get('/menus.change.status/{menu}',[MenuController::class,'change_menu_status'])->name('menus.change.status');

    Route::get('/delete.table/{table}',[TableController::class,'delete_table'])->name('delete.table');
    Route::get('/tables.change.status/{table}',[TableController::class,'change_table_status'])->name('tables.change.status');

    Route::get('/delete.resarvation/{resarvation}',[TableController::class,'delete_table'])->name('delete.resarvation');
    Route::get('/reservations.change.status/{table}',[TableController::class,'change_table_status'])->name('reservations.change.status');
    
});

require __DIR__.'/auth.php';
