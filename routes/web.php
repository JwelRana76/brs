<?php

use App\Http\Controllers\BrsController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\JlnoController;
use App\Http\Controllers\MoujaController;
use App\Http\Controllers\PlotTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\UpazilaController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'setting/role', 'as' => 'role.'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
        Route::get('/permission/{id}', [RoleController::class, 'permission'])->name('permission');
        Route::post('/permission/store/{id}', [RoleController::class, 'permission_store'])->name('permission.store');
    });
    Route::group(['prefix' => 'setting/user', 'as' => 'user.'], function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
        Route::post('/store', [UsersController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
        Route::post('/update/{id}', [UsersController::class, 'update'])->name('update');
        Route::get('/assign_role/{id}', [UsersController::class, 'assign_role'])->name('role_assign');
        Route::post('/assign_role', [UsersController::class, 'assign_role_store'])->name('role_assign_store');
    });
    Route::group(['prefix' => 'setting/site_setting', 'as' => 'site_setting.'], function () {
        Route::get('/', [SiteSettingController::class, 'index'])->name('index');
        Route::post('/update/{id}', [SiteSettingController::class, 'update'])->name('update');
    });
    Route::group(['prefix' => 'setting/division', 'as' => 'division.'], function () {
        Route::get('/', [DivisionController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [DivisionController::class, 'edit'])->name('edit');
        Route::post('/store', [DivisionController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [DivisionController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'setting/district', 'as' => 'district.'], function () {
        Route::get('/', [DistrictController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('edit');
        Route::post('/store', [DistrictController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [DistrictController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'setting/upazila', 'as' => 'upazila.'], function () {
        Route::get('/', [UpazilaController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [UpazilaController::class, 'edit'])->name('edit');
        Route::post('/store', [UpazilaController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [UpazilaController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'setting/mouja', 'as' => 'mouja.'], function () {
        Route::get('/', [MoujaController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [MoujaController::class, 'edit'])->name('edit');
        Route::post('/store', [MoujaController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [MoujaController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'setting/jlno', 'as' => 'jlno.'], function () {
        Route::get('/', [JlnoController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [JlnoController::class, 'edit'])->name('edit');
        Route::post('/store', [JlnoController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [JlnoController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'setting/plottype', 'as' => 'plottype.'], function () {
        Route::get('/', [PlotTypeController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [PlotTypeController::class, 'edit'])->name('edit');
        Route::post('/store', [PlotTypeController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [PlotTypeController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'brs', 'as' => 'brs.'], function () {
        Route::get('/', [BrsController::class, 'index'])->name('index');
        Route::get('/create', [BrsController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [BrsController::class, 'edit'])->name('edit');
        Route::post('/store', [BrsController::class, 'store'])->name('store');
        Route::post('/update/{id}', [BrsController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [BrsController::class, 'delete'])->name('delete');

        Route::get('/find_district/{id}', [BrsController::class, 'find_district']);
    });
});

Auth::routes();
