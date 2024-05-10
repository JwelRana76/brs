<?php

use App\Http\Controllers\BrsController;
use App\Http\Controllers\CsController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\JlnoController;
use App\Http\Controllers\KhajnaController;
use App\Http\Controllers\MoujaController;
use App\Http\Controllers\PlotTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaController;
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

// Route::get('/', function () {
//     return view('pages.frontend.index');
// });
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
        Route::get('/view/{id}', [BrsController::class, 'view'])->name('view');
    });
    Route::group(['prefix' => 'sa', 'as' => 'sa.'], function () {
        Route::get('/', [SaController::class, 'index'])->name('index');
        Route::get('/create', [SaController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [SaController::class, 'edit'])->name('edit');
        Route::post('/store', [SaController::class, 'store'])->name('store');
        Route::post('/update/{id}', [SaController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [SaController::class, 'delete'])->name('delete');
        Route::get('/view/{id}', [SaController::class, 'view'])->name('view');
    });
    Route::group(['prefix' => 'cs', 'as' => 'cs.'], function () {
        Route::get('/', [CsController::class, 'index'])->name('index');
        Route::get('/create', [CsController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [CsController::class, 'edit'])->name('edit');
        Route::post('/store', [CsController::class, 'store'])->name('store');
        Route::post('/update/{id}', [CsController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CsController::class, 'delete'])->name('delete');
        Route::get('/view/{id}', [CsController::class, 'view'])->name('view');
    });
    Route::group(['prefix' => 'khajna', 'as' => 'khajna.'], function () {
        Route::get('/', [KhajnaController::class, 'index'])->name('index');
        Route::get('/create', [KhajnaController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [KhajnaController::class, 'edit'])->name('edit');
        Route::post('/store', [KhajnaController::class, 'store'])->name('store');
        Route::post('/update/{id}', [KhajnaController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [KhajnaController::class, 'delete'])->name('delete');
        Route::get('/view/{id}', [KhajnaController::class, 'view'])->name('view');
    });
    Route::group(['prefix' => 'front', 'as' => 'front.'], function () {
        Route::get('/', [FrontendController::class, 'index'])->name('index');
    });

});

Auth::routes();
