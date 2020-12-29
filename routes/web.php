<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StructureTypeController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OpportunityTypeController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\LocalityController;
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

Route::get('/', ['as' => 'home', function () {
	
    return view('front/index');
}]);

Route::get('/blog',['as' => 'blog', function () {
    return view('blog/index');
}]);

Route::get('/about',['as' => 'about', function () {
    return view('pages/about');
}]);



Route::get('/contact-us',['as' => 'contact_us', function () {
    return view('pages/contact_us');
}]);

Route::get('/faq',['as' => 'faq', function () {
    return view('pages/faq');
}]);

Route::get('/cgu',['as' => 'cgu', function () {
    return view('pages/cgu');
}]);

Route::get('/privacy-policy',['as' => 'privacy_policy', function () {
    return view('pages/privacy_policy');
}]);

// For Breeze 
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

*/
Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware(['auth'])->name('dashboard');




Route::resource('roles', RoleController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::resource('profiles', 'ProfileController')->middleware(['auth']);
Route::resource('specialities', SpecialityController::class)->middleware(['auth']);
Route::resource('opportunity_types', OpportunityTypeController::class)->middleware(['auth']);
Route::resource('opportunities', OpportunityController::class)->middleware(['auth']);
Route::resource('post_categories', PostCategoryController::class)->middleware(['auth']);
Route::resource('posts', PostController::class)->middleware(['auth']);
Route::resource('structure_types', StructureTypeController::class)->middleware(['auth']);
Route::resource('structures', StructureController::class)->middleware(['auth']);
Route::resource('contact_forms', ContactFormController::class);
Route::resource('localities', LocalityController::class);
require __DIR__.'/auth.php';
