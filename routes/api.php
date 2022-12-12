<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactTypeController;
Use App\Http\Controllers\CountryController;
use App\Http\Controllers\IndustryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->group(function () {

    Route::prefix('city')->group(function () {
        Route::get('/get', [CityController::class, 'getAllCities']);
        Route::post('/create', [CityController::class, 'createNewCity']);
        Route::post('/edit', [CityController::class, 'editCity']);
        Route::post('/delete', [CityController::class, 'deleteCity']);
    });

    Route::prefix('client')->group(function () {
        Route::post('/get', [ClientController::class, 'getAllClients']);
        Route::post('/create', [ClientController::class, 'createNewClient']);
        Route::post('/edit', [ClientController::class, 'editClient']);
        Route::post('/delete', [ClientController::class, 'deleteClient']);
    });

    Route::prefix('contact-type')->group(function () {
        Route::get('/get', [ContactTypeController::class, 'getAllContactTypes']);
        Route::post('/create', [ContactTypeController::class, 'createNewContactType']);
        Route::post('/edit', [ContactTypeController::class, 'editContactType']);
        Route::post('/delete', [ContactTypeController::class, 'deleteContactType']);
    });

    Route::prefix('country')->group(function () {
        Route::get('/get', [CountryController::class, 'getAllCountries']);
        Route::post('/create', [CountryController::class, 'createNewCountry']);
        Route::post('/edit', [CountryController::class, 'editCountry']);
        Route::post('/delete', [CountryController::class, 'deleteCountry']);
    });

    Route::prefix('industry')->group(function () {
        Route::get('/get', [IndustryController::class, 'getAllIndustries']);
        Route::post('/create', [IndustryController::class, 'createNewIndustry']);
        Route::post('/edit', [IndustryController::class, 'editIndustry']);
        Route::post('/delete', [IndustryController::class, 'deleteIndustry']);
    });


});
