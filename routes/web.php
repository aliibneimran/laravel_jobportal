<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\backend\CandidateController as BackendCandidateController;
use App\Http\Controllers\backend\CategoryController as BackendCategoryController;
use App\Http\Controllers\backend\CompanyController as BackendCompanyController;
use App\Http\Controllers\backend\HomeController as BackendHomeController;
use App\Http\Controllers\backend\JobController as BackendJobController;
use App\Http\Controllers\backend\JobPostController as BackendJobPostController;
use App\Http\Controllers\backend\PaymentController as BackendPaymentController;
use App\Http\Controllers\backend\ProfileController as BackendProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\CandidateController as FrontendCandidateController;
use App\Http\Controllers\frontend\CandidateDetailsController as FrontendCandidateDetailsController;
use App\Http\Controllers\frontend\CandidateProfileController as FrontendCandidateProfileController;
use App\Http\Controllers\frontend\CompanyController as FrontendCompanyController;
use App\Http\Controllers\frontend\CompanyDetailsController as FrontendCompanyDetailsController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\JobDetailsController as FrontendJobDetailsController;
use App\Http\Controllers\frontend\JobListController as FrontendJobListController;
use App\Http\Controllers\frontend\LoginController as FrontendRegisterController;
use App\Http\Controllers\frontend\ProfileController as FrontendProfileController;
use App\Http\Controllers\frontend\RegisterController as FrontendLoginController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//frontend
Route::get('/', [FrontendHomeController::class, 'index']);
Route::get('/jobs', [FrontendJobListController::class, 'index']);

Route::get('/job/details/{id}', [FrontendJobDetailsController::class, 'index'])->name('job.details');
Route::post('/job/apply/{id}', [FrontendJobDetailsController::class, 'apply'])->name('apply');

Route::get('/companies', [FrontendCompanyController::class, 'index']);
Route::get('/company-details', [FrontendCompanyDetailsController::class, 'index']);
Route::get('/candidates', [FrontendCandidateController::class, 'index']);
Route::get('/candidate-details', [FrontendCandidateDetailsController::class, 'index']);
// Route::get('/candidate-profile', [FrontendCandidateProfileController::class, 'index']);
Route::get('/register',[FrontendRegisterController::class,'index']);
Route::get('/signin',[FrontendLoginController::class,'index']);


// Route::resource('/candidate-profile', FrontendProfileController::class);



//Cart
Route::get('cart', [FrontendJobListController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [FrontendJobListController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [FrontendJobListController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [FrontendJobListController::class, 'remove'])->name('remove.from.cart');

//backend
Route::get('/admin', [BackendHomeController::class, 'index']);
Route::get('/all-candidates', [BackendCandidateController::class, 'index']);
Route::get('/all-companies', [BackendCompanyController::class, 'index']);
Route::get('/all-jobs', [BackendJobController::class, 'index']);
Route::get('/profile', [BackendProfileController::class, 'index']);
// Route::get('/post-job', [BackendJobPostController::class, 'index']);
Route::get('/categories', [BackendCategoryController::class, 'index']);
Route::get('/add-category', [BackendCategoryController::class, 'create']);
Route::get('/payments', [BackendPaymentController::class, 'index']);


Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login']);
    Route::post('login', [AdminController::class, 'store'])->name('adminLogin');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('register', [AdminController::class, 'register']);
});

Route::prefix('jobseeker')->group(function (){
    Route::get('login', [JobSeekerController::class, 'login']);
    Route::post('login', [JobSeekerController::class, 'store'])->name('JobseekerLogin');
    Route::get('dashboard', [JobSeekerController::class, 'dashboard'])->name('jobseeker.dashboard');
});

//Autentication
Route::get('/admin',[AuthController::class,'login'])->name('singin');
Route::post('login',[AuthController::class,'AuthLogin'])->name('login');
Route::get('register',[AuthController::class,'Register'])->name('register');
Route::post('register',[AuthController::class,'AuthRegister'])->name('signup');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
// Route::get('/admin/dashboard',[AdminController::class,'index']);

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard',[DashboardController::class,'index']);

});
Route::group(['middleware'=>'company'],function(){
    Route::get('company/dashboard',[DashboardController::class,'index']);

});
// Candidate
Route::group(['middleware' => 'candidate'], function () {
    Route::get('/candidate-profile', [FrontendProfileController::class, 'index']);
    Route::get('/candidate-profile/create', [FrontendProfileController::class, 'create'])->name('create.profile');
    Route::post('/candidate-profile/store', [FrontendProfileController::class, 'store'])->name('store.profile');
    Route::get('/candidate-profile/edit/{id}', [FrontendProfileController::class, 'edit'])->name('edit.profile');
    Route::post('/candidate-profile/update/{id}', [FrontendProfileController::class, 'update'])->name('update.profile');
});

Route::group(['middleware'=>'editor'],function(){
    Route::get('editor/dashboard',[DashboardController::class,'index']);

});
//Applicants
Route::get('applicants', [ApplicantController::class, 'index'])
    ->name('applicants');

//Category
Route::get('catagories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('catagories/create', [CategoryController::class, 'create'])
    ->name('categories.create');
Route::post('catagories/store', [CategoryController::class, 'store'])
    ->name('categories.store');
Route::get('catagories/edit/{cid}', [CategoryController::class, 'edit'])
    ->name('categories.edit');
Route::post('catagories/update/{cid}', [CategoryController::class, 'update'])
    ->name('categories.update');
Route::get('catagories/delete/{cid}', [CategoryController::class, 'destroy'])
    ->name('categories.delete');

//Industry
Route::get('industries', [IndustryController::class, 'index'])
    ->name('industries.index');
Route::get('industries/create', [IndustryController::class, 'create'])
    ->name('industries.create');
Route::post('industries/store', [IndustryController::class, 'store'])
    ->name('industries.store');
Route::get('industries/edit/{cid}', [IndustryController::class, 'edit'])
    ->name('industries.edit');
Route::post('industries/update/{cid}', [IndustryController::class, 'update'])
    ->name('industries.update');
Route::get('industries/delete/{cid}', [IndustryController::class, 'destroy'])
    ->name('industries.delete');

//Location
Route::get('locations', [LocationController::class, 'index'])
    ->name('locations.index');
Route::get('locations/create', [LocationController::class, 'create'])
    ->name('locations.create');
Route::post('locations/store', [LocationController::class, 'store'])
    ->name('locations.store');
Route::get('locations/edit/{lid}', [LocationController::class, 'edit'])
    ->name('locations.edit');
Route::post('locations/update/{cld}', [LocationController::class, 'update'])
    ->name('locations.update');
Route::get('locations/delete/{lid}', [LocationController::class, 'destroy'])
    ->name('locations.delete');

//job
Route::get('all-job', [JobController::class, 'index'])
    ->name('jobs.index');
Route::get('jobs/create', [JobController::class, 'create'])
    ->name('jobs.create');
Route::post('jobs/store', [JobController::class, 'store'])
    ->name('jobs.store');
Route::get('jobs/edit/{jid}', [JobController::class, 'edit'])
    ->name('jobs.edit');
Route::post('jobs/update/{jid}', [JobController::class, 'update'])
    ->name('jobs.update');
Route::get('jobs/delete/{jid}', [JobController::class, 'destroy'])
    ->name('jobs.delete');





require __DIR__ . '/auth.php';
