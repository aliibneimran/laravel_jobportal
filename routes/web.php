<?php

use App\Http\Controllers\CategoryController;
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

use App\Http\Controllers\frontend\CandidateController as FrontendCandidateController;
use App\Http\Controllers\frontend\CandidateDetailsController as FrontendCandidateDetailsController;
use App\Http\Controllers\frontend\CandidateProfileController as FrontendCandidateProfileController;
use App\Http\Controllers\frontend\CompanyController as FrontendCompanyController ;
use App\Http\Controllers\frontend\CompanyDetailsController as FrontendCompanyDetailsController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\JobDetailsController as FrontendJobDetailsController;
use App\Http\Controllers\frontend\JobListController as FrontendJobListController;
use App\Http\Controllers\frontend\LoginController as FrontendRegisterController;
use App\Http\Controllers\frontend\RegisterController as FrontendLoginController;

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

require __DIR__.'/auth.php';


//frontend
Route::get('/',[FrontendHomeController::class,'index']);
Route::get('/jobs',[FrontendJobListController::class,'index']);
Route::get('/job-details',[FrontendJobDetailsController::class,'index']);
Route::get('/companies',[FrontendCompanyController::class,'index']);
Route::get('/company-details',[FrontendCompanyDetailsController::class,'index']);
Route::get('/candidates',[FrontendCandidateController::class,'index']);
Route::get('/candidate-details',[FrontendCandidateDetailsController::class,'index']);
Route::get('/candidate-profile',[FrontendCandidateProfileController::class,'index']);
// Route::get('/register',[FrontendRegisterController::class,'index']);
// Route::get('/signin',[FrontendLoginController::class,'index']);

//backend
Route::get('/admin',[BackendHomeController::class,'index']);
Route::get('/all-candidates',[BackendCandidateController::class,'index']);
Route::get('/all-companies',[BackendCompanyController::class,'index']);
Route::get('/all-jobs',[BackendJobController::class,'index']);
Route::get('/profile',[BackendProfileController::class,'index']);
Route::get('/post-job',[BackendJobPostController::class,'index']);
Route::get('/categories',[BackendCategoryController::class,'index']);
Route::get('/add-category',[BackendCategoryController::class,'create']);
Route::get('/payments',[BackendPaymentController::class,'index']);

