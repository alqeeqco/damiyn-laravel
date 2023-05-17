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
use App\Http\Controllers\Auth\Admin\AuthAdminController;
use App\Http\Controllers\Auth\Site\AuthSiteController;
use App\Http\Controllers\NotifictionController;
use App\Http\Controllers\Website\BlogSiteController;
use App\Http\Controllers\Website\FeatureSiteController;
use App\Http\Controllers\Website\IndexController;
use App\Http\Controllers\Website\OrderSiteController;
use App\Http\Controllers\Website\ProfileSiteController;
use App\Http\Controllers\Website\SliderSiteController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Application cache has been cleared';
});

Route::view('not-allowed', 'site.index');

/*              Login start site                           */
Route::get('/register', [AuthSiteController::class, 'siteregister'])->name('site.register');
Route::post('/register', [AuthSiteController::class, 'siteregisterPost'])->name('site.register');
Route::get('/login', [AuthSiteController::class, 'sitelogin'])->name('login.site');
Route::post('/login', [AuthSiteController::class, 'siteloginPost'])->name('site.login');
Route::delete('/site/logout', [AuthSiteController::class, 'logout'])->name('site.logout');

/*              end  start site  login                          */


Route::group(['prefix' => LaravelLocalization::setLocale() . '/site', 'as' => 'site.',
'middleware' => ['auth']], function () {

    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/profile/edit', [ProfileSiteController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update/{id}', [ProfileSiteController::class, 'update'])->name('profile.update');
    Route::get('/blogs', [BlogSiteController::class, 'blogs'])->name('blogs');
    Route::get('/blogs/{slug}', [BlogSiteController::class, 'show'])->name('blogs.show');
    Route::get('/order/index', [OrderSiteController::class, 'orderIndex'])->name('order/index');
    Route::post('/order/store', [OrderSiteController::class, 'orderStore'])->name('orderStore');
    Route::post('/order/ajax_search', [OrderSiteController::class, 'ajax_search'])->name('order.ajax_search');
    Route::get('/order/show/{id}', [OrderSiteController::class, 'orderShow'])->name('orderShow');
    Route::get('/slider/index', [SliderSiteController::class, 'sliderIndex'])->name('slider.index');
    Route::get('/features/index', [FeatureSiteController::class, 'featuresIndex'])->name('features.index');
    Route::get('/send-sms', [IndexController::class, 'send_sms'])->name('send_sms');
});

Route::get('/verfiction', [AuthController::class, 'verfictionIndex'])->name('verfictionIndex');
Route::post('/verfictionStore', [AuthController::class, 'verfictionStore'])->name('verfictionStore');


Route::get('/', [IndexController::class, 'homeIndex'])->name('homeIndex');
Route::get('/home/Blogs', [IndexController::class, 'homeBlogs'])->name('homeBlogs');
