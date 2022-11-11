<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WireController; 
use App\Http\Controllers\SpliceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AjouterController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\ExporterController;


use Illuminate\http\Request;

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



///admin section
// Route::prefix('administrator')->middleware(['auth','isAdmin'])->group(function(){
//    Route::get('/ajouter',[RegisterController::class,'index'])->name('admin.ajouter');

//    /*  Route::get('/ajouter', function () {
//         return view('admin.ajouter');
//     });  */
    
// });


Route::group(['prefix' => 'admin'], function () {
    Route::get('/ajouter', function () {
        return view('admin.ajouter');
    });

   

   

 
  
    Route::controller(ExporterController::class)->group(function(){
        Route::get('exporter', 'index');
       //Route::get('exporter', 'search');
        Route::get('historique-export', 'export')->name('historique.export');
        Route::get('exporter','ShowData');
        
        
   });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
    Route::get('/home',[App\Http\Controllers\WireController::class, 'show']);
    

    Route::get('/splices', function () {
        return view('admin.splices');
    });
    

    
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin');
    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'show']);

});

Route::get('admin/splices',[App\Http\Controllers\SpliceController::class,'index'])->name('admin.splices');


Route::get('/dashbord', function () {
    return view('layouts/master');
});

 Route::get('/wires', function () {
    return view('circuit');
}); 



 

//Route::get('/wires',[App\Http\Controllers\WireController::class,'index'])->name('circuit');
//Route::get('/wires',[App\Http\Controllers\WireController::class,'search']);


//Route::get('/wires',[App\Http\Controllers\HistoriqueController::class, 'create'])->name('circuit');
//Route::post('/wires',[App\Http\Controllers\HistoriqueController::class, 'validator'])->name('circuit');
//Route::post('/wires',[App\Http\Controllers\HistoriqueController::class, 'store'])->name('circuit');
//Route::get('/operateur/dashboard', [DashboardController::class, 'storeH']);


/* Route::controller(App\Http\Controllers\Operateur\DashboardController::class)->group(function(){

    Route::get('operateur.dashboard', 'index');
    Route::get('operateur.dashboard', 'search');
    Route::post('operateur.dashboard', 'storeH');
    
}); */

Route::controller(WireController::class)->group(function(){
    Route::get('wires', 'index');
    Route::get('wires', 'search');
    Route::post('wires', 'storeH');
  
});


Route::controller(PostsController::class)->group(function(){
    Route::get('admin/posts', 'index');
   Route::get('admin/posts', 'show');
   Route::post('admin/posts', 'store');
   Route::get('admin/posts/{id}', 'destroy')->name('posts.destroy');
 //Route::post('admin/posts/{id}', 'editPost')->name('posts.editPost');
 //Route::get('admin/posts/{id}','getPost')->name('getPost');
  
});

//Route::post('admin/posts', [PostsController::class, 'update'])->name('posts.update');

/* Route::get(
    '/wires',
    [App\Http\Controllers\WireController::class,'search']
)->name('circuit'); */


Route::get('/splices', function () {
    return view('splices');
});





 /* Route::get('/ajouter', function () {
    return view('admin.ajouter');
});  */ 

 

 Route::controller(SpliceController::class)->group(function(){
     Route::get('splices', 'index');
     Route::get('splices-export', 'export')->name('splices.export');
     Route::post('splices-import', 'import')->name('splices.import');
     Route::get('splices-delete', 'delete')->name('splices.delete');
});


Route::controller(homeController::class)->group(function(){
    Route::get('wire', 'index');
    Route::get('wires-export', 'export')->name('wires.export');
    Route::post('wires-import', 'import')->name('wires.import');
    Route::get('wires-delete', 'delete')->name('wires.delete');
});


//test d'aithentification admin/oper


Route::get('/operateur/dashboard', [App\Http\Controllers\Operateur\DashboardController::class, 'index'])->middleware('role:operateur');
// Route::get('/admin/ajouter', [App\Http\Controllers\Auth\AjouterController::class, 'index'])->middleware('role:admin');
//Route::post('/admin/ajouter', [App\Http\Controllers\Auth\AjouterController::class, 'index']);
   





///route for getting workstation of a wire
//Route::get('/wires',[WireController::class,'index']);

//Route::get('/wires?{wire_name}',[WireController::class,'store']);

//Route::get('/wires?request()->query("wire_name")',[WireController::class,'index']);
 //Route::get('/wires', [App\Http\Controllers\WireController::class, 'index']);

 Route::get('{location}',[App\Http\Controllers\WireController::class, 'index']);


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
