<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\dashboaedController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\NotifictionController;
use App\Http\Controllers\Website\indexController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('admin/login', function () {
    return view('auth.admin.login');
});

Route::view('not-allowed', 'site.index');
Route::group(['prefix' => LaravelLocalization::setLocale() . '/admin', 'as' => 'admin.', 'middleware' => ['auth', 'check_user']], function () {

    Route::get('dashboard/index', [dashboaedController::class, 'index'])->name('dashboard.index');



    /*              start slider                                     */
    Route::get('slider/index', [SliderController::class, 'index'])->name('slider.index');
    Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('slider/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
    /*              end slider

    /*              start settings                                     */
    Route::get('settings/index', [SettingController::class, 'index'])->name('settings.index');
    Route::get('settings/create', [SettingController::class, 'create'])->name('settings.create');
    Route::post('settings/store', [SettingController::class, 'store'])->name('settings.store');
    Route::get('settings/edit/{id}', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('settings/update/{id}', [SettingController::class, 'update'])->name('settings.update');
    Route::delete('settings/delete/{id}', [SettingController::class, 'delete'])->name('settings.delete');

    /*              end settings                                     */

    /*              start blogs                                     */
    Route::get('blogs/index', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('blogs/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('blogs/delete/{id}', [BlogController::class, 'delete'])->name('blogs.delete');
    /*              end blogs                                     */

    /*              start order                                     */
    Route::get('order/index', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('order/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('order/update/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('order/delete/{id}', [OrderController::class, 'delete'])->name('order.delete');
    Route::post('order/new_order/{id}', [OrderController::class, 'new_order'])->name('order.new_order');
    /*              end order                                     */

    /*              start Features                                     */
    Route::get('features/index', [FeatureController::class, 'index'])->name('features.index');
    Route::get('features/create', [FeatureController::class, 'create'])->name('features.create');
    Route::post('features/store', [FeatureController::class, 'store'])->name('features.store');
    Route::get('features/edit/{id}', [FeatureController::class, 'edit'])->name('features.edit');
    Route::post('features/update/{id}', [FeatureController::class, 'update'])->name('features.update');
    Route::delete('features/delete/{id}', [FeatureController::class, 'delete'])->name('features.delete');
    /*              end Features                                     */

    /*              start profile                                     */
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('resetPassword', [ProfileController::class, 'reset_Password'])->name('resetPassword');
    Route::post('reset-Password', [ProfileController::class, 'resetPassword'])->name('admin.resetPassword');
    /*              end profile                                     */

    /*              start review                                     */
    Route::get('reviews/index', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('reviews/edit/{id}', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::post('reviews/update/{id}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('reviews/delete/{id}', [ReviewController::class, 'delete'])->name('reviews.delete');
    /*              end profile                           */

    /*              start team                                     */
    Route::get('teams/index', [TeamController::class, 'index'])->name('teams.index');
    Route::get('teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('teams/store', [TeamController::class, 'store'])->name('teams.store');
    Route::get('teams/edit/{id}', [TeamController::class, 'edit'])->name('teams.edit');
    Route::post('teams/update/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('teams/delete/{id}', [TeamController::class, 'delete'])->name('teams.delete');
    /*              end team                           */
});


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('site/register', [AuthController::class, 'siteregister'])->name('site.register');
Route::post('site/register', [AuthController::class, 'siteregisterPost'])->name('site.register');
Route::get('site/login', [AuthController::class, 'sitelogin'])->name('site.login');
Route::post('site/login', [AuthController::class, 'siteloginPost'])->name('site.login');


Route::group(['prefix' => LaravelLocalization::setLocale() . '/site', 'as' => 'site.', 'middleware' => ['auth']], function () {

    Route::get('/', [indexController::class, 'index'])->name('home');
    Route::get('/profile/edit', [indexController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update/{id}', [indexController::class, 'update'])->name('profile.update');
    Route::get('/blogs', [indexController::class, 'blogs'])->name('blogs');
    Route::get('/order/index', [indexController::class, 'orderIndex'])->name('order/index');
    Route::get('/order/show/{id}', [indexController::class, 'orderShow'])->name('orderShow');
    Route::post('/order/store', [indexController::class, 'orderStore'])->name('orderStore');
    Route::post('/order/ajax_search', [indexController::class, 'ajax_search'])->name('order.ajax_search');
    Route::get('/slider/index', [indexController::class, 'sliderIndex'])->name('slider.index');
    Route::get('/features/index', [indexController::class, 'featuresIndex'])->name('features.index');
    Route::get('/send-sms', [indexController::class, 'send_sms'])->name('send_sms');
    Route::get('/verfiction', [AuthController::class, 'verfictionIndex'])->name('verfictionIndex');
    Route::post('/verfictionStore', [AuthController::class, 'verfictionStore'])->name('verfictionStore');


});

Route::get('/',[indexController::class,'homeIndex'])->name('homeIndex');
Route::get('/home/Blogs',[indexController::class,'homeBlogs'])->name('homeBlogs');
