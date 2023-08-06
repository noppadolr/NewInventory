<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\SupplierController;

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
    return view('admin.admin_login_view');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware(['auth','role:admin'])->group(function () {
        Route::controller(AdminController::class)->group(function (){
            Route::get('/admin/dashboard','AdminDashboard')->name('admin.dashboard');
            Route::get('/admin/profile','AdminProfile')->name('admin.profile');
            Route::post('/store/profile','StoreProfile')->name('store.profile');
            Route::get('/admin/change/password','ChangePassword')->name('admin.change.password');
            Route::post('/admin/updadte/password','UpdatePassword')->name('admin.update.password');

        });


});

    Route::controller(SupplierController::class)->group(function (){
        Route::get('/supplier/all','SupplierAll')->name('supplier.all');
    });


Route::middleware(['auth','role:agent'])->group(function () {
        Route::controller(AgentController::class)->group(function (){
            Route::get('/agent/dashboard','AgentDashboard')->name('agent.dashboard');
        });
});

Route::controller(AuthController::class)->group(function (){
    Route::get('/user/logout','UserLogout')->name('user.logout');
});

Route::post('/admin/login',[AuthController::class,'AdminLogin'])->name('admin.login');
Route::get('/admin/login/view',[AdminController::class,'LoginView'])->name('admin.login.view');


