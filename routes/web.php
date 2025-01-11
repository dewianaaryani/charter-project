<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\MembershipTransactionController;
use App\Http\Controllers\Admin\SalesTransactionController;
use App\Http\Controllers\Admin\AccessLogController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TransactionDetailController;
use App\Http\Controllers\Admin\InventoryController;
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

Route::get('/', function () {
    return view('home');
});

// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/memberships', [HomeController::class, 'memberships'])->name('memberships');

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {

  
    Route::get('/registermemberships/{user_id}', [HomeController::class, 'registermemberships'])->name('registermemberships');
    Route::post('/postregistermemberships/{user_id}', [HomeController::class, 'postregistermemberships'])->name('postregistermemberships');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {

  
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('memberships', MembershipController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
        Route::get('/memberships/create/{user_id}', [MembershipController::class, 'create'])->name('memberships.create');
        Route::post('/memberships/store/{user_id}', [MembershipController::class, 'store'])->name('memberships.store');
        Route::resource('membershiptransactions', MembershipTransactionController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
        Route::get('/membershiptransactions/create/{user_id}', [MembershipTransactionController::class, 'create'])->name('membershiptransactions.create');
        Route::put('/membershiptransactions/store/{user_id}', [MembershipTransactionController::class, 'store'])->name('membershiptransactions.store');

        Route::resource('/salestransactions', SalesTransactionController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
        Route::get('/salestransactions/create/{user_id}', [SalesTransactionController::class, 'create'])->name('salestransactions.create');
        Route::post('/salestransactions/store/{member_id}', [SalesTransactionController::class, 'store'])->name('salestransactions.store');

        Route::post('/detailstransactions/store/{sale_id}', [TransactionDetailController::class, 'store'])->name('detailstransactions.store');
        Route::delete('/detailstransactions/destroy/{detail_id}', [TransactionDetailController::class, 'destroy'])->name('detailstransactions.destroy');
        
        Route::resource('/inventories', InventoryController::class);

        Route::post('/checkout/gym/{member_id}', [MembershipController::class, 'checkoutGym'])->name('checkout.gym');
        Route::post('/checkin/gym/{member_id}', [MembershipController::class, 'checkinGym'])->name('checkin.gym');
        Route::resource('/accesslog', AccessLogController::class)->only(['index']);
        Route::resource('/reports', ReportController::class);
    });
    
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');


});