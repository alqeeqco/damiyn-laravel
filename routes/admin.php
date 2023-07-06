<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\dashboaedController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\Admin\AuthAdminController;
use App\Http\Controllers\Auth\Site\AuthSiteController;
use App\Http\Controllers\NotifictionController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('admin/login', function () {
    return view('auth.admin.login');
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Application cache has been cleared';
});



Route::group(['prefix' => LaravelLocalization::setLocale() . '/admin', 'as' => 'admin.', 'middleware' => ['auth', 'check_user']], function () {

    Route::get('dashboard/index', [dashboaedController::class, 'index'])->name('dashboard.index');
    /*              start slider         */
    Route::resource('slider', SliderController::class);
    Route::get('slider/toggle_active/{id}', [SliderController::class, 'toggle_active'])->name('slider.toggle_active');

    /*              end slider

    /*              start settings                                     */
    Route::resource('settings', SettingController::class);
    Route::get('settings/toggle_active/{id}', [SettingController::class, 'toggle_active'])->name('settings.toggle_active');
    /*              end settings                                     */

    /*              start blogs                                     */
    Route::resource('blogs', BlogController::class);
    Route::get('blogs/toggle_active/{id}', [BlogController::class, 'toggle_active'])->name('blogs.toggle_active');
    /*              end blogs                                     */

    /*              start order                                     */
    Route::resource('order', OrderController::class);
    Route::post('order/new_order/{id}', [OrderController::class, 'new_order'])->name('order.new_order');
    Route::get('order/toggle_active/{id}', [OrderController::class, 'toggle_active'])->name('order.toggle_active');
    Route::get('order/order_status/{id}', [OrderController::class, 'order_status'])->name('order.order_status');
    Route::post('order/createPaymentUrl', [OrderController::class, 'createPaymentUrl'])->name('order.createPaymentUrl');
    Route::get('order/Callback/{id}', [OrderController::class, 'Callback'])->name('order.Callback');


    /*              end order                                     */

    /*              start Features                                     */
    Route::resource('features', FeatureController::class);
    Route::get('features/toggle_active/{id}', [FeatureController::class, 'toggle_active'])->name('features.toggle_active');
    /*              end Features                                     */

    /*              start profile                                     */
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('resetPassword', [ProfileController::class, 'reset_Password'])->name('resetPassword');
    Route::post('reset-Password', [ProfileController::class, 'resetPassword'])->name('admin.resetPassword');
    /*              end profile                                     */

    /*              start review                                     */
    Route::resource('reviews', ReviewController::class);
    Route::get('reviews/toggle_active/{id}', [ReviewController::class, 'toggle_active'])->name('reviews.toggle_active');
    /*              end profile                           */

    /*              start team                                     */
    Route::resource('teams', TeamController::class);
    Route::get('teams/toggle_active/{id}', [TeamController::class, 'toggle_active'])->name('teams.toggle_active');
    /*              end team                           */

    Route::get('users/index',[UserController::class,'index'])->name('users.index');
    Route::delete('users/delete/{id}',[UserController::class,'delete'])->name('users.delete');
});

/*              Login start Admin                           */

Route::get('/admin/login', [AuthAdminController::class, 'login'])->name('login');
Route::post('/admin/login', [AuthAdminController::class, 'loginPost'])->name('login');
Route::delete('admin/logout', [AuthAdminController::class, 'logout'])->name('admin.logout')->middleware('auth');
/*              end  start Admin  login                          */
