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
use App\Http\Controllers\TownController;
use App\Http\Controllers\NeighborhoodController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\StructureCategoryController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\SubscriptionRequestController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\VisitSummaryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PrestationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\StructurePrestationController;
use App\Http\Controllers\BusinessLicenseController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DoctorOrderController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashboardController;














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




Route::get('/contact-us',['as' => 'contact_us_path', function () {
    return view('pages/contact_us');
}]);

Route::get('/faq',['as' => 'faq_path', function () {
    return view('pages/faq');
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

Route::get('/about', [StaticPageController::class, 'about'])->name('about_path');
Route::get('/cgu', [StaticPageController::class, 'cgu'])->name('cgu_path');
Route::get('/privacy-policy', [StaticPageController::class, 'privacy_policy'])->name('privacy_policy_path');


/*
Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware(['auth'])->name('dashboard_path');

*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard_path')->middleware(['auth']);


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
Route::resource('towns', TownController::class)->middleware(['auth']);
Route::resource('neighborhoods', NeighborhoodController::class)->middleware(['auth']);

Route::resource('subscription_requests', SubscriptionRequestController::class);
Route::resource('logs', ActivityLogController::class)->middleware(['auth']);
Route::resource('contributions', ContributionController::class)->middleware(['auth']);
Route::resource('document_types', DocumentTypeController::class)->middleware(['auth']);

Route::resource('document_requests', DocumentRequestController::class)->middleware(['auth']);

Route::resource('visit_summaries', VisitSummaryController::class)->middleware(['auth']);
Route::resource('services', ServiceController::class)->middleware(['auth']);
Route::resource('prestations', PrestationController::class)->middleware(['auth']);
Route::resource('staffs', StaffController::class)->middleware(['auth']);
Route::resource('pages', PageController::class)->middleware(['auth']);
Route::resource('structure_prestations', StructurePrestationController::class)->middleware(['auth']);
Route::resource('approvals', ApprovalController::class)->middleware(['auth']);
Route::resource('business_licenses', BusinessLicenseController::class)->middleware(['auth']);

Route::resource('doctor_orders', DoctorOrderController::class)->middleware(['auth']);

Route::resource('features', FeatureController::class)->middleware(['auth']);
Route::resource('permissions', PermissionController::class)->middleware(['auth']);





require __DIR__.'/auth.php';
