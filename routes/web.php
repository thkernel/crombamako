<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminProfileController;
//use App\Http\Controllers\DoctorProfileController;
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
use App\Http\Controllers\PriceConfigurationController;

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
use App\Http\Controllers\StructureStaffController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\StructurePrestationController;
use App\Http\Controllers\OrganizationController;

use App\Http\Controllers\BusinessLicenseController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DoctorOrderController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StructureServiceController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\DoctorSituationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportExcelController;


use App\Http\Controllers\Auth\VerifyEmailController;










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

Route::name('search_structures_path')->get('/search/structures', [SearchController::class, 'search_structures']);

Route::get('/doctors/locality', [DoctorSituationController::class, 'situation_locality'])->name('doctors_situation_locality_path');

Route::get('/doctors/approval', [DoctorSituationController::class, 'situation_approval'])->name('doctors_situation_approval_path');

Route::get('/doctors/license', [DoctorSituationController::class, 'situation_license'])->name('doctors_situation_license_path');

Route::get('/doctors/license', [DoctorSituationController::class, 'situation_business_license'])->name('doctors_situation_business_license_path');

Route::get('/doctors/contribution', [DoctorSituationController::class, 'situation_contribution'])->name('doctors_situation_contribution_path');

Route::get('/structures/situation', [StructureController::class, 'structure_situation'])->name('structures_situation_path');







Route::get('/contact-us',['as' => 'contact_us_path', function () {
    return view('pages/contact_us');
}]);
/*
Route::get('/faq',['as' => 'faq_path', function () {
    return view('pages/faq');
}]);*/





Route::put('/validate-subscription/{subscription_request}', [SubscriptionRequestController::class, 'validate_subscription'])->middleware(['auth'])->name('subscription_request.validate_subscription');

Route::get('/structures/categories', [StructureController::class, 'categories'])->name('structures.categories');


Route::get('/structure_categories/all', [StructureCategoryController::class, 'all'])->name('structure_categories.all');

Route::get('/structures/category/{slug}', [StructureController::class, 'category'])->name('structures.category');


Route::get('/opportunities/all', [OpportunityController::class, 'all'])->name('opportunities.all');
Route::get('/posts/all', [PostController::class, 'all'])->name('all_posts_path');

Route::get('/ressources/all', [ResourceController::class, 'all'])->name('all_resources_path');


Route::get('/opportunity/show/{slug}', [OpportunityController::class, 'show'])->name('show_opportunity_path');
Route::get('/post/show/{slug}', [PostController::class, 'show'])->name('show_post_path');

Route::get('/structures/show/{slug}', [StructureController::class, 'show'])->name('show_structure_path');

Route::get('/structure_type/delete/{slug}', [StructureTypeController::class, 'delete'])->name('delete_structure_type_path')->middleware(['auth']);

Route::get('/about', [StaticPageController::class, 'about'])->name('about_path');

Route::get('/faq', [StaticPageController::class, 'faq'])->name('faq_path');

Route::get('/demarches-administratives', [StaticPageController::class, 'administrative_procedures'])->name('administrative_procedures_path');

Route::get('/cgu', [StaticPageController::class, 'cgu'])->name('cgu_path');
Route::get('/privacy-policy', [StaticPageController::class, 'privacy_policy'])->name('privacy_policy_path');


/*
Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware(['auth'])->name('dashboard_path');

*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard_path')->middleware(['auth']);

Route::get('/contributions/statement', [ContributionController::class, 'statement'])->name('contributions_statement_path')->middleware(['auth']);

Route::put('/contribution/{id}/cancel/', [ContributionController::class, 'cancel'])->name('contributions.cancel')->middleware(['auth']);

Route::put('/document_requests/{id}/validate/', [DocumentRequestController::class, 'validate_request'])->name('document_requests.validate')->middleware(['auth']);

Route::put('/document_requests/{id}/cancel/', [DocumentRequestController::class, 'cancel_request'])->name('document_requests.cancel')->middleware(['auth']);

Route::put('/doctor_profile/{id}/change-satus/', [DoctorController::class, 'change_status'])->name('doctors.change_status')->middleware(['auth']);


Route::get('/change_password/profile/{id}/', [UserController::class, 'change_password'])->name('users.change_password')->middleware(['auth']);



Route::resource('admin_profiles', AdminProfileController::class)->middleware(['auth']);

Route::resource('doctor_profiles', DoctorProfileController::class)->middleware(['auth']);

Route::resource('roles', RoleController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::resource('doctors', DoctorController::class)->middleware(['auth']);
Route::resource('profiles', 'ProfileController')->middleware(['auth']);
Route::resource('specialities', SpecialityController::class)->middleware(['auth']);

Route::resource('price_configurations', PriceConfigurationController::class)->middleware(['auth']);

Route::resource('opportunity_types', OpportunityTypeController::class)->middleware(['auth']);
Route::resource('opportunities', OpportunityController::class, [
    'only' => ['index', 'create', 'store', 'edit', 'destroy', 'update']])->middleware(['auth']);

Route::resource('post_categories', PostCategoryController::class)->middleware(['auth']);
Route::resource('posts', PostController::class, [
    'only' => ['index', 'create', 'store', 'edit', 'destroy', 'update']])->middleware(['auth']);
Route::resource('structure_types', StructureTypeController::class)->middleware(['auth']);
Route::resource('structure_categories', StructureCategoryController::class)->middleware(['auth']);
Route::resource('structures' , StructureController::class, [
    'only' => ['index', 'create', 'store', 'edit', 'destroy', 'update']])->middleware(['auth']);
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

Route::resource('structure_staffs', StructureStaffController::class)->middleware(['auth']);

Route::resource('pages', PageController::class)->middleware(['auth']);
Route::resource('structure_prestations', StructurePrestationController::class)->middleware(['auth']);
Route::resource('structure_services', StructureServiceController::class)->middleware(['auth']);

Route::resource('approvals', ApprovalController::class)->middleware(['auth']);

Route::resource('organizations', OrganizationController::class)->middleware(['auth']);

Route::resource('business_licenses', BusinessLicenseController::class)->middleware(['auth']);

Route::resource('doctor_orders', DoctorOrderController::class)->middleware(['auth']);

Route::resource('features', FeatureController::class)->middleware(['auth']);
Route::resource('permissions', PermissionController::class)->middleware(['auth']);

Route::resource('resources', ResourceController::class)->middleware(['auth']);


Route::get('neighborhoods/get/{id}', [NeighborhoodController::class, "getNeighborhoods"]);

Route::get('/pdf/statement',[ContributionController::class, 'download_statement_pdf'])->name("download_statement_pdf_path");

Route::get('/document_requests/{id}/pdf/',[DocumentRequestController::class, 'download_document_request_pdf'])->name("download_document_request_pdf_path");


Route::get('/pdf/doctors_situation_locality',[DoctorSituationController::class, 'download_doctor_situation_locality_pdf'])->name("download_doctor_situation_locality_pdf_path");

Route::get('/pdf/doctors_situation_approval',[DoctorSituationController::class, 'download_doctor_situation_approval_pdf'])->name("download_doctor_situation_approval_pdf_path");

Route::get('/pdf/doctors_situation_business_license',[DoctorSituationController::class, 'download_doctor_situation_business_license_pdf'])->name("download_doctor_situation_business_license_pdf_path");

Route::get('/pdf/doctors_situation_contribution',[DoctorSituationController::class, 'download_doctor_situation_contribution_pdf'])->name("download_doctor_situation_contribution_pdf_path");

Route::get('/pdf/structures_situation',[StructureController::class, 'download_structure_situation_pdf'])->name("download_structure_situation_pdf_path");




/* Confirmation mail */

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)->middleware(['signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

Route::get('ckeditor', [CkeditorController::class, 'index']);
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('upload');

Route::get('/import_excel', [ImportExcelController::class, 'index'])->name('import_excel.index')->middleware(['auth']);

Route::post('/import_excel/import', [ImportExcelController::class, 'import'])->name('import_excel.import')->middleware(['auth']);

/* Auth routes */
require __DIR__.'/auth.php';


