<?php

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

Route::get('/', ['as' => 'home', function () {
    return view('front/index');
}]);

Route::get('/blog',['as' => 'blog', function () {
    return view('blog/index');
}]);

Route::get('/about',['as' => 'about', function () {
    return view('pages/about');
}]);

Route::get('/opportunities',['as' => 'opportunities', function () {
    return view('opportunities/index');
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