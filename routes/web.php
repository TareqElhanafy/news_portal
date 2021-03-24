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
    });

});
