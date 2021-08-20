<?php

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

use Illuminate\Support\Facades\Route;

// ======================================= ADMIN =================================================//
Route::group(['namespace' => 'Admin', 'prefix' => 'acp', 'middleware' => ['permission.admin']], function() {
    // ============================== DASHBOARD ==========================
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/',[
            'uses' => 'DashboardController@index',
            'as' => 'dashboard'
        ]);
    });
    // ============================== SLIDER ==============================
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/',[
            'uses' => 'SliderController@index',
            'as' => 'slider'
        ]);
        Route::get('form/{id?}',[
            'uses' => 'SliderController@form',
            'as' => 'slider/form'
        ])->whereNumber('id');
        Route::post('save',[
            'uses' => 'SliderController@save',
            'as' => 'slider/save'
        ]);
        Route::get('/delete/{id}',[
            'uses' => 'SliderController@delete',
            'as' => 'slider/delete'
        ])->where('id', '[0-9]+');;
        Route::get('/change-status-{status}/{id}',[
            'uses' => 'SliderController@status',
            'as' => 'slider/status'
        ])->whereNumber('id');
    });
    // ============================== CATEGORY ==============================
    Route::group(['prefix' => 'category'], function () {
        Route::get('/',[
            'uses' => 'CategoryController@index',
            'as' => 'category'
        ]);
        Route::get('form/{id?}',[
            'uses' => 'CategoryController@form',
            'as' => 'category/form'
        ])->whereNumber('id');
        Route::post('save',[
            'uses' => 'CategoryController@save',
            'as' => 'category/save'
        ]);
        Route::get('/delete/{id}',[
            'uses' => 'CategoryController@delete',
            'as' => 'category/delete'
        ])->where('id', '[0-9]+');;
        Route::get('/change-status-{status}/{id}',[
            'uses' => 'CategoryController@status',
            'as' => 'category/status'
        ])->whereNumber('id');
        Route::get('/change-is-home-{is_home}/{id}',[
            'uses' => 'CategoryController@isHome',
            'as' => 'category/isHome'
        ])->whereNumber('id');
        Route::get('change-display-{display}/{id}',[
            'uses' => 'CategoryController@display',
            'as' => 'category/display'
        ])->whereNumber('id');
    });
    // ============================== ARTICLE ==============================
    Route::group(['prefix' => 'article'], function () {
        Route::get('/',[
            'uses' => 'ArticleController@index',
            'as' => 'article'
        ]);
        Route::get('form/{id?}',[
            'uses' => 'ArticleController@form',
            'as' => 'article/form'
        ])->whereNumber('id');
        Route::post('save',[
            'uses' => 'ArticleController@save',
            'as' => 'article/save'
        ]);
        Route::get('/delete/{id}',[
            'uses' => 'ArticleController@delete',
            'as' => 'article/delete'
        ])->where('id', '[0-9]+');;
        Route::get('/change-status-{status}/{id}',[
            'uses' => 'ArticleController@status',
            'as' => 'article/status'
        ])->whereNumber('id');
        Route::get('change-display-{type}/{id}',[
            'uses' => 'ArticleController@type',
            'as' => 'article/type'
        ])->whereNumber('id');
    });
    // ============================== USER ==============================
    Route::group(['prefix' => 'user'], function () {
        Route::get('/',[
            'uses' => 'UserController@index',
            'as' => 'user'
        ]);
        Route::get('form/{id?}',[
            'uses' => 'UserController@form',
            'as' => 'user/form'
        ])->whereNumber('id');
        Route::post('save',[
            'uses' => 'UserController@save',
            'as' => 'user/save'
        ]);
        Route::get('/delete/{id}',[
            'uses' => 'UserController@delete',
            'as' => 'user/delete'
        ])->where('id', '[0-9]+');;
        Route::get('/change-status-{status}/{id}',[
            'uses' => 'UserController@status',
            'as' => 'user/status'
        ])->whereNumber('id');
        Route::post('change-password',[
            'uses' => 'UserController@changePassword',
            'as' => 'user/change-password'
        ])->whereNumber('id');
        Route::get('change-level-{level}/{id}',[
            'uses' => 'UserController@level',
            'as' => 'user/level'
        ])->whereNumber('id');
    });
    // ============================== RSS ==============================
    Route::group(['prefix' => 'rss'], function () {
        Route::get('/',[
            'uses' => 'RssController@index',
            'as' => 'rss'
        ]);
        Route::get('form/{id?}',[
            'uses' => 'RssController@form',
            'as' => 'rss/form'
        ])->whereNumber('id');
        Route::post('save',[
            'uses' => 'RssController@save',
            'as' => 'rss/save'
        ]);
        Route::get('/delete/{id}',[
            'uses' => 'RssController@delete',
            'as' => 'rss/delete'
        ])->where('id', '[0-9]+');;
        Route::get('/change-status-{status}/{id}',[
            'uses' => 'RssController@status',
            'as' => 'rss/status'
        ])->whereNumber('id');
    });
});

// ======================================= FRONT =================================================//
Route::group(['namespace' => 'News', 'prefix' => 'news'], function() {
    // ============================== HOMEPAGE ==============================
    Route::group(['prefix' =>  ''], function(){
        Route::get('/', [
            'uses' => 'HomeController@index',
            'as' => 'home'
        ]);
    });
    // ============================== CATEGORY ===============
    Route::group(['prefix' =>  'chuyen-muc'], function(){
        Route::get('/{category_name}/{category_id}', [
            'uses' => 'CategoryController@index',
            'as' => 'category/index'
        ])->where('category_name', '[0-9a-zA-Z_-]+')
          ->where('category_id', '[0-9]+');;
    });
    // ====================== ARTICLE ========================
    Route::group(['prefix' =>  'bai-viet'], function(){
        Route::get('/{article_name}-{article_id}.html', [
            'uses' => 'ArticleController@index',
            'as' => 'article/index'
        ])->where('article_name', '[0-9a-zA-Z_-]+')
            ->where('article_id', '[0-9]+');;
    });
    // ====================== NOTIFY ========================
    Route::group(['prefix' =>  ''], function(){
        Route::get('/no-permission', [
            'uses' => 'NotifyController@noPermission',
            'as' => 'notify/noPermission'
        ]);
    });
    // ====================== LOGIN ========================
    Route::group(['prefix' =>  ''], function(){
        Route::get('/login', [
            'uses' => 'AuthController@login',
            'as' => 'auth/login'
        ])->middleware('check.login');;
        Route::post('/postLogin', [
            'uses' => 'AuthController@postLogin',
            'as' => 'auth/postLogin'
        ]);
        Route::get('/logout', [
            'uses' => 'AuthController@logout',
            'as' => 'auth/logout'
        ]);
    });
    // ====================== RSS ========================
    Route::group(['prefix' =>  ''], function(){
        Route::get('/tin-tuc-tong-hop', [
            'uses' => 'RssController@index',
            'as' => 'rss/index'
        ]);
        Route::get('/get-gold', [
            'uses' => 'RssController@get-gold',
            'as' => 'rss/getGold'
        ]);
        Route::get('/get-coin', [
            'uses' => 'RssController@get-coin',
            'as' => 'rss/getCoin'
        ]);
    });
});


