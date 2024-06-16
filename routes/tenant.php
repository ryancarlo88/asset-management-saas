<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::resource('mutation', 'App\Http\Controllers\MutationController');
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('type', 'App\Http\Controllers\TypeController');
    Route::resource('asset', 'App\Http\Controllers\AssetController');
    Route::resource('location', 'App\Http\Controllers\LocationController');
    Route::resource('unit', 'App\Http\Controllers\UnitController');
    Route::resource('people', 'App\Http\Controllers\PeopleController');
    Route::resource('schedule', 'App\Http\Controllers\ScheduleController');
    Route::resource('vendor', 'App\Http\Controllers\VendorController');

    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    Route::get('/loginpage', 'App\Http\Controllers\ControllerSystem@loginpage');
    Route::post('/login', 'App\Http\Controllers\ControllerSystem@login')->name('tenant.login');
    Route::get('/dashboarduser', 'App\Http\Controllers\ControllerSystem@dashboarduser')->middleware('auth.basic');
    Route::get('/categories', 'App\Http\Controllers\ControllerSystem@categories');
    Route::get('/types', 'App\Http\Controllers\ControllerSystem@types');
    Route::get('/fixedasset', 'App\Http\Controllers\ControllerSystem@asset');
    Route::get('/location', 'App\Http\Controllers\ControllerSystem@location');
    Route::get('/mutation', 'App\Http\Controllers\ControllerSystem@mutation')->middleware('auth.basic');
    Route::get('/unit', 'App\Http\Controllers\ControllerSystem@unit');
    Route::get('/people', 'App\Http\Controllers\ControllerSystem@people');
    Route::get('/schedule', 'App\Http\Controllers\ControllerSystem@schedule');
    Route::get('/vendor', 'App\Http\Controllers\ControllerSystem@vendor');
    Route::get('fullcalender', 'App\Http\Controllers\ScheduleController@index');

    Route::get('/detailasset/{id}', 'App\Http\Controllers\AssetController@showAssetDetails');
    Route::get('/detailmutation/{id}', 'App\Http\Controllers\MutationController@showMutationDetails')->name('mutation.detail')->middleware('auth.basic');
    // Route::get('/detailmutation', 'App\Http\Controllers\MutationController@showMutationDetails')->name('mutation.detail')->middleware('auth.basic');

    Route::get('/detailschedule/{id}', 'App\Http\Controllers\ScheduleController@showScheduleDetails');
    Route::get('/updateschedule/{id}', 'App\Http\Controllers\ScheduleController@showScheduleDetailsForUpdate');
    Route::get('/updateasset/{id}', 'App\Http\Controllers\AssetController@showAssetDetailsForUpdate');
    Route::get('/barcode/{id}', 'App\Http\Controllers\AssetController@generateQrCode');

    Route::post('/categories/deleteData', 'App\Http\Controllers\CategoryController@deleteData')->name('category.deleteData');
    Route::post('/location/deleteData', 'App\Http\Controllers\LocationController@deleteData')->name('location.deleteData');
    Route::post('/unit/deleteData', 'App\Http\Controllers\UnitController@deleteData')->name('unit.deleteData');
    Route::post('/type/deleteData', 'App\Http\Controllers\TypeController@deleteData')->name('type.deleteData');
    Route::post('/people/deleteData', 'App\Http\Controllers\PeopleController@deleteData')->name('people.deleteData');
    Route::post('/schedule/deleteData', 'App\Http\Controllers\ScheduleController@deleteData')->name('schedule.deleteData');
    Route::post('/fixedasset/deleteData', 'App\Http\Controllers\AssetController@deleteData')->name('fixedasset.deleteData');
    Route::post('/vendor/deleteData', 'App\Http\Controllers\VendorController@deleteData')->name('vendor.deleteData');

    Route::post('/categories/saveDataField', 'App\Http\Controllers\CategoryController@saveDataField')->name('category.saveDataField');
    Route::post('/location/saveDataField', 'App\Http\Controllers\LocationController@saveDataField')->name('location.saveDataField');
    Route::post('/unit/saveDataField', 'App\Http\Controllers\UnitController@saveDataField')->name('unit.saveDataField');
    Route::post('/type/saveDataField', 'App\Http\Controllers\TypeController@saveDataField')->name('type.saveDataField');
    Route::post('/people/saveDataField', 'App\Http\Controllers\PeopleController@saveDataField')->name('people.saveDataField');
    Route::post('/vendor/saveDataField', 'App\Http\Controllers\VendorController@saveDataField')->name('vendor.saveDataField');

    Route::post('/mutation/getAsset/', 'App\Http\Controllers\MutationController@getAsset')->name('mutation.getAsset');
    Route::post('/mutation/getLocation/', 'App\Http\Controllers\MutationController@getLocation')->name('mutation.getLocation');
    Route::post('/mutation/getReceiver/', 'App\Http\Controllers\MutationController@getReceiver')->name('mutation.getReceiver');
    Route::post('/mutation/validateData', 'App\Http\Controllers\MutationController@validateMutation')->name('mutation.validateData');
    Route::post('/mutation/cancelData', 'App\Http\Controllers\MutationController@cancelMutation')->name('mutation.cancelData');

    Route::post('/schedule/getAsset', 'App\Http\Controllers\ScheduleController@getAsset')->name('schedule.getAsset');
    Route::post('/schedule/updateData', 'App\Http\Controllers\ScheduleController@updateData')->name('schedule.updateData');
    Route::post('/fixedasset/updateData', 'App\Http\Controllers\AssetController@updateData')->name('fixedasset.updateData');
    Route::post('/fixedasset/upload', 'App\Http\Controllers\AssetController@uploadBerita')->name('fixedasset.uploadBerita');

    Route::post('/logouttenant', 'App\Http\Controllers\ControllerSystem@logouttenant')->name('tenant.logouttenant')->middleware('auth.basic');
});
