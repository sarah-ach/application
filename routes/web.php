<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WireController; 
use App\Http\Controllers\SpliceController;


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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/dashbord', function () {
    return view('layouts/master');
});

Route::get('/circuit', function () {
    return view('wire');
});

Route::get('/exporter', function () {
    return view('exporter');
});

Route::get('/splices', function () {
    return view('splices');
});



 Route::get('/home',[App\Http\Controllers\WireController::class, 'show']);

Route::get('/ajouter', function () {
    return view('ajouter');
});

// Route::get('splices',[SpliceController::class,'index']);

 Route::controller(SpliceController::class)->group(function(){
     Route::get('splices', 'index');
     Route::get('splices-export', 'export')->name('splices.export');
     Route::post('splices-import', 'import')->name('splices.import');
     Route::get('splices-delete', 'delete')->name('splices.delete');
});


///route for getting workstation of a wire
Route::get('/circuit',[WireController::class,'index1']);


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
/* Route::middleware(['auth', 'user-access:operateur'])->group(function () {
  
    Route::get('/circuit', [WireController::class, 'show'])->name('wire');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
/*Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
 */