<?php

use App\Http\Controllers\ScheduleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faq', function () {
    return view('faq');
});
//Master

//User


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify/{id}', 'MasterController@createtenancy');
Route::post('/cancelVerification', 'MasterController@cancelVerification')->name('user.cancelVerification');

Route::middleware(['auth', 'can:access'])->group(function () {
    Route::get('/dashboardmaster', 'MasterController@dashboardmaster');
    Route::get('/tenants', 'MasterController@tenants');
});

Route::middleware(['auth', 'can:userAccess'])->group(function () {
    // Route::resource('mutation', 'MutationController');
    // Route::resource('category', 'CategoryController');
    // Route::resource('type', 'TypeController');
    // Route::resource('asset', 'AssetController');
    // Route::resource('schedule', 'ScheduleController');
    // Route::get('fullcalender', 'ScheduleController@index');
    // Route::get('/dashboarduser', 'ControllerSystem@dashboarduser');
    /*  Route::get('/fixedasset', 'ControllerSystem@asset'); */
    // Route::get('/schedule', 'ControllerSystem@schedule');
    /*  Route::get('/categories', 'ControllerSystem@categories');
    Route::get('/types', 'ControllerSystem@types'); */
    // Route::get('/detailasset/{id}', 'AssetController@showAssetDetails');
    // Route::get('/detailmutation/{id}', 'MutationController@showMutationDetails');
    // Route::get('/detailschedule/{id}', 'ScheduleController@showScheduleDetails');
    // Route::get('/mutation', 'ControllerSystem@mutation');
    // Route::post('/mutation/deleteData', 'MutationController@deleteData')->name('mutation.deleteData');
    // Route::get('/updatemutation/{id}', 'MutationController@dataForUpdate');
    // Route::post('/mutation/editData', 'MutationController@editData')->name('mutation.editData');
    /* Route::post('/categories/deleteData', 'CategoryController@deleteData')->name('category.deleteData');
    Route::post('/categories/saveDataField', 'CategoryController@saveDataField')->name('category.saveDataField');
    Route::post('/type/deleteData', 'TypeController@deleteData')->name('type.deleteData');
    Route::post('/type/saveDataField', 'TypeController@saveDataField')->name('type.saveDataField'); */
    // Route::post('/schedule/deleteData', 'ScheduleController@deleteData')->name('schedule.deleteData');
    // Route::post('/mutation/getAsset/', 'MutationController@getAsset')->name('mutation.getAsset');
});
