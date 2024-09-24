<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashbardController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminResponseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Students\StudentHistoryController;
use App\Http\Controllers\Students\StudentHomeController;
use App\Http\Controllers\Students\StudentReportController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('/admin')->group(function () {
    Route::controller(AdminDashbardController::class)->prefix('/dashboard')->group(function () {
        Route::get('/', 'index')->name('admin.dashboard');
    });
    Route::controller(AdminCategoryController::class)->prefix('/category')->group(function () {
        Route::get('/', 'index')->name('admin.category');
        Route::get('/create', 'create')->name('admin.category.create');
        Route::post('/store', 'store')->name('admin.category.store');
        Route::post('/search', 'show')->name('admin.category.search');
        Route::get('/edit/{id}', 'edit')->name('admin.category.edit');
        Route::post('/update/{id}', 'update')->name('admin.category.update');
        Route::get('/delete/{id}', 'destroy')->name('admin.category.delete');
    });
    Route::controller(AdminReportController::class)->prefix('/report')->group(function () {
        Route::get('/{id?}', 'index')->name('admin.report');
        Route::get('/detail/{id}', 'show')->name('admin.report.detail');
        Route::post('/search/{id}', 'search')->name('admin.report.search');
    });
    Route::controller(AdminResponseController::class)->prefix('/response')->group(function () {
        Route::post('/store/{id}', 'store')->name('admin.response.store');
        Route::get('process/{id}', 'process')->name('admin.response.process');
    });
    Route::controller(\App\Http\Controllers\Admin\AdminInformationController::class)->prefix('/information')->group(function () {
        Route::get('/', 'index')->name('admin.information');
        Route::get('/create', 'create')->name('admin.information.create');
        Route::post('/store', 'store')->name('admin.information.store');
        Route::get('/edit/{id}', 'edit')->name('admin.information.edit');
        Route::post('/update/{id}', 'update')->name('admin.information.update');
        Route::get('/destroy/{id}', 'destroy')->name('admin.information.destroy');
    });
});

Route::middleware(['auth', 'verified', 'role:student'])->prefix('/student')->group(function () {
    Route::controller(StudentHomeController::class)->prefix('/home')->group(function () {
        Route::get('/', 'index')->name('student.home');
    });
    Route::controller(StudentReportController::class)->prefix('/report')->group(function () {
        Route::get('/add-report', 'create')->name('student.report.create');
        Route::post('/store', 'store')->name('student.report.store');
        Route::get('/detail/{id}', 'show')->name('student.report.detail');
        Route::get('/edit/{id}', 'edit')->name('student.report.edit');
        Route::post('/update/{id}', 'update')->name('student.report.update');
        Route::get('/{id?}', 'index')->name('student.report.find');
        Route::post('/search/{id}', 'search')->name('student.report.search');
    });
    Route::controller(StudentHistoryController::class)->prefix('/history')->group(function () {
        Route::get('/', 'index')->name('student.history');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/home_amru', [function () {
    return view('profile_amru');
}]);

require __DIR__ . '/auth.php';
