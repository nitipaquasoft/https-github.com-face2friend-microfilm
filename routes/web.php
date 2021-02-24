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

Route::get('/', function () {
    return redirect('login');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/student', 'HomeController@student')->name('student');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'roles']], function () {



Route::resource('content', 'Admin\ContentController');
Route::resource('plan', 'Admin\PlanController');
Route::resource('profile', 'Admin\ProfileController');
Route::resource('rating', 'Admin\RatingController');
Route::resource('stream', 'Admin\StreamController');
Route::resource('subscription', 'Admin\SubscriptionController');
Route::resource('view', 'Admin\ViewController');
Route::resource('wishlist', 'Admin\WishlistController');
    Route::get('users/role/{role_id}', 'Admin\UsersController@indexByRoleId')->name('users-role');
    Route::get('users/create/{role_id}', 'Admin\UsersController@create');
    Route::get('users/{id}/edit/{role_id}', 'Admin\UsersController@edit');


    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logo', 'HomeController@getImage');
    Route::get('/', 'HomeController@index')->name('home');
    ;
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::resource('users/role', 'Admin\UsersController');
    Route::resource('pages', 'Admin\PagesController');
    Route::resource('activitylogs', 'Admin\ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);

    //do here


    Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
});




Route::resource('configuration', 'Admin\ConfigurationController');
Route::get('configuration', 'Admin\ConfigurationController@customEdit');
