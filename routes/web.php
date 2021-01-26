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
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\StructureCategoryController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\SubscriptionRequestController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\CertificateTypeController;
use App\Http\Controllers\CertificateRequestController;
use App\Http\Controllers\VisitSummaryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SearchController;







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

Route::name('home_path')->get('/', [FrontController::class, 'index']);
Route::name('search_doctors_path')->get('/search/doctors', [SearchController::class, 'search_doctors']);



Route::get('/about',['as' => 'about_path', function () {
    return view('pages/about');
}]);



Route::get('/contact-us',['as' => 'contact_us_path', function () {
    return view('pages/contact_us');
}]);

Route::get('/faq',['as' => 'faq_path', function () {
    return view('pages/faq');
}]);

Route::get('/cgu',['as' => 'cgu_path', function () {
    return view('pages/cgu');
}]);

Route::get('/privacy-policy',['as' => 'privacy_policy_path', function () {
    return view('pages/privacy_policy');
}]);

Route::put('/validate-subscription/{subscription_request}', [SubscriptionRequestController::class, 'validate_subscription'])->middleware(['auth'])->name('subscription_request.validate_subscription');

Route::get('/structures/categories', [StructureController::class, 'categories'])->name('structures.categories');

Route::get('/structure_categories/all', [StructureCategoryController::class, 'all'])->name('structure_categories.all');

Route::get('/structures/category/{slug}', [StructureController::class, 'category'])->name('structures.category');


Route::get('/opportunities/all', [OpportunityController::class, 'all'])->name('opportunities.all');
Route::get('/posts/all', [PostController::class, 'all'])->name('all_posts_path');

Route::get('/opportunity/show/{slug}', [OpportunityController::class, 'show'])->name('show_opportunity_path');
Route::get('/post/show/{slug}', [PostController::class, 'show'])->name('show_post_path');
Route::get('/structure_type/delete/{slug}', [StructureTypeController::class, 'delete'])->name('delete_structure_type_path')->middleware(['auth']);


Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware(['auth'])->name('dashboard_path');




Route::resource('roles', RoleController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::resource('doctors', DoctorController::class)->middleware(['auth']);
Route::resource('profiles', 'ProfileController')->middleware(['auth']);
Route::resource('specialities', SpecialityController::class)->middleware(['auth']);
Route::resource('opportunity_types', OpportunityTypeController::class)->middleware(['auth']);
Route::resource('opportunities', OpportunityController::class, [
    'only' => ['index', 'create', 'store', 'edit', 'destroy', 'update']])->middleware(['auth']);

Route::resource('post_categories', PostCategoryController::class)->middleware(['auth']);
Route::resource('posts', PostController::class, [
    'only' => ['index', 'create', 'store', 'edit', 'destroy', 'update']])->middleware(['auth']);
Route::resource('structure_types', StructureTypeController::class)->middleware(['auth']);
Route::resource('structure_categories', StructureCategoryController::class)->middleware(['auth']);
Route::resource('structures', StructureController::class)->middleware(['auth']);
Route::resource('contact_forms', ContactFormController::class);
Route::resource('localities', LocalityController::class)->middleware(['auth']);
Route::resource('subscription_requests', SubscriptionRequestController::class);
Route::resource('logs', ActivityLogController::class)->middleware(['auth']);
Route::resource('contributions', ContributionController::class)->middleware(['auth']);
Route::resource('certificate_types', CertificateTypeController::class)->middleware(['auth']);

Route::resource('certificate_requests', CertificateRequestController::class)->middleware(['auth']);

Route::resource('visit_summaries', VisitSummaryController::class)->middleware(['auth']);


require __DIR__.'/auth.php';
