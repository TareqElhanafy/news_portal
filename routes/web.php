<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('frontPage');
Route::get('/en', 'HomeController@setEnglish')->name('setEnglish');
Route::get('/ar', 'HomeController@setArabic')->name('setArabic');
Route::get('/categories/{id}', 'HomeController@categoryPosts')->name('category.posts');
Route::get('/subcategories/{id}', 'HomeController@subcategoryPosts')->name('subcategory.posts');
Route::get('posts/{id}/post', 'PostController@singlePost')->name('singlePost');
Route::get('/search/get/subdistricts/{id}', 'Admin\DistrictController@getSubdistricts')->name('subdistricts.search');
Route::get('/search/district', 'HomeController@search')->name('search.district.posts');


Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    /**
     *
     * Categories Routes
     */
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@index')->name('admin.categories');
        Route::get('/create', 'CategoryController@create')->name('admin.categories.create');
        Route::post('/store', 'CategoryController@store')->name('admin.categories.store');
        Route::get('/edit/{id}/{name_en}', 'CategoryController@edit')->name('admin.categories.edit');
        Route::post('/update/{id}/{name_en}', 'CategoryController@update')->name('admin.categories.update');
        Route::get('/delete/{id}/{name_en}', 'CategoryController@destroy')->name('admin.categories.delete');
        Route::get('/get/subcategories/{id}', 'CategoryController@getSubcategories')->name('admin.categories.subcategories');
    });

    /**
     *
     * SubCategories Routes
     */
    Route::group(['prefix' => 'sub-categories'], function () {
        Route::get('/', 'SubCategoryController@index')->name('admin.subcategories');
        Route::get('/create', 'SubCategoryController@create')->name('admin.subcategories.create');
        Route::post('/store', 'SubCategoryController@store')->name('admin.subcategories.store');
        Route::get('/edit/{id}/{name_en}', 'SubCategoryController@edit')->name('admin.subcategories.edit');
        Route::post('/update/{id}/{name_en}', 'SubCategoryController@update')->name('admin.subcategories.update');
        Route::get('/delete/{id}/{name_en}', 'SubCategoryController@destroy')->name('admin.subcategories.delete');
    });

    /**
     *
     * Districts Routes
     */
    Route::group(['prefix' => 'districts'], function () {
        Route::get('/', 'DistrictController@index')->name('admin.districts');
        Route::get('/create', 'DistrictController@create')->name('admin.districts.create');
        Route::post('/store', 'DistrictController@store')->name('admin.districts.store');
        Route::get('/edit/{id}/{name_en}', 'DistrictController@edit')->name('admin.districts.edit');
        Route::post('/update/{id}/{name_en}', 'DistrictController@update')->name('admin.districts.update');
        Route::get('/delete/{id}/{name_en}', 'DistrictController@destroy')->name('admin.districts.delete');
        Route::get('/get/subdistricts/{id}', 'DistrictController@getSubdistricts')->name('admin.districts.subdistricts');
    });

    /**
     *
     * Sub-Districts Routes
     */
    Route::group(['prefix' => 'sub-districts'], function () {
        Route::get('/', 'SubDistrictController@index')->name('admin.subdistricts');
        Route::get('/create', 'SubDistrictController@create')->name('admin.subdistricts.create');
        Route::post('/store', 'SubDistrictController@store')->name('admin.subdistricts.store');
        Route::get('/edit/{id}/{name_en}', 'SubDistrictController@edit')->name('admin.subdistricts.edit');
        Route::post('/update/{id}/{name_en}', 'SubDistrictController@update')->name('admin.subdistricts.update');
        Route::get('/delete/{id}/{name_en}', 'SubDistrictController@destroy')->name('admin.subdistricts.delete');
    });

    /**
     *
     * Posts Routes
     */
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostController@index')->name('admin.posts');
        Route::get('/create', 'PostController@create')->name('admin.posts.create');
        Route::post('/store', 'PostController@store')->name('admin.posts.store');
        Route::get('/edit/{id}', 'PostController@edit')->name('admin.posts.edit');
        Route::post('/update/{id}', 'PostController@update')->name('admin.posts.update');
        Route::get('/delete/{id}', 'PostController@destroy')->name('admin.posts.delete');
    });

    /**
     *
     * Settings
     */
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/social', 'SocialController@index')->name('admin.settings.social');
        Route::post('/social/update/{id}', 'SocialController@update')->name('admin.settings.social.update');
        Route::get('/seo', 'SeoController@index')->name('admin.settings.seo');
        Route::post('/seo/update/{id}', 'SeoController@update')->name('admin.settings.seo.update');
        Route::get('/prayer', 'PrayerController@index')->name('admin.settings.prayer');
        Route::post('/prayer/update/{id}', 'PrayerController@update')->name('admin.settings.prayer.update');
        Route::get('/livetv', 'LivetvController@index')->name('admin.settings.livetv');
        Route::post('/livetv/update/{id}', 'LivetvController@update')->name('admin.settings.livetv.update');
        Route::get('/livetv/change-status', 'LivetvController@changeStatus')->name('admin.settings.livetv.status');
        Route::get('/notice', 'NoticeController@index')->name('admin.settings.notice');
        Route::post('/notice/update/{id}', 'NoticeController@update')->name('admin.settings.notice.update');
        Route::get('/notice/change-status', 'NoticeController@changeStatus')->name('admin.settings.notice.status');
    });

    /**
     *
     * Websites Routes
     */
    Route::group(['prefix' => 'websites'], function () {
        Route::get('/', 'WebsiteController@index')->name('admin.websites');
        Route::get('/create', 'WebsiteController@create')->name('admin.websites.create');
        Route::post('/store', 'WebsiteController@store')->name('admin.websites.store');
        Route::get('/edit/{id}', 'WebsiteController@edit')->name('admin.websites.edit');
        Route::post('/update/{id}', 'WebsiteController@update')->name('admin.websites.update');
        Route::get('/delete/{id}', 'WebsiteController@destroy')->name('admin.websites.delete');
    });

    /**
     *
     * Gallery Routes
     */
    Route::group(['prefix' => 'gallery'], function () {
        Route::group(['prefix' => 'photos'], function () {
            Route::get('/', 'PhotoController@index')->name('admin.photos');
            Route::get('/create', 'PhotoController@create')->name('admin.photos.create');
            Route::post('/store', 'PhotoController@store')->name('admin.photos.store');
            Route::get('/edit/{id}', 'PhotoController@edit')->name('admin.photos.edit');
            Route::post('/update/{id}', 'PhotoController@update')->name('admin.photos.update');
            Route::get('/delete/{id}', 'PhotoController@destroy')->name('admin.photos.delete');
        });

        Route::group(['prefix' => 'videos'], function () {
            Route::get('/', 'VideoController@index')->name('admin.videos');
            Route::get('/create', 'VideoController@create')->name('admin.videos.create');
            Route::post('/store', 'VideoController@store')->name('admin.videos.store');
            Route::get('/edit/{id}', 'VideoController@edit')->name('admin.videos.edit');
            Route::post('/update/{id}', 'VideoController@update')->name('admin.videos.update');
            Route::get('/delete/{id}', 'VideoController@destroy')->name('admin.videos.delete');
        });
    });

    /**
     *
     * Ads Routes
     */
    Route::group(['prefix'=>'ads'], function(){
        Route::get('/', 'AdsController@index')->name('admin.ads');
        Route::get('/create', 'AdsController@create')->name('admin.ads.create');

    });
});
