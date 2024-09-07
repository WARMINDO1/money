<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CurrencyPairController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\UsersController;
use App\Models\Currency;
use App\Models\CurrencyPair;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/getSourceForBuy/{sourceId}', [HomeController::class, 'getOriginAndDestination']);
Route::get('/getSourceForSell/{sourceId}', [HomeController::class, 'getOriginAndDestination']);

// Route::get('/getBuyRate/{sourceId}/{origin}/{destination}', [HomeController::class, 'getCrossRate']);
// Route::get('/getSellRate/{sourceId}/{origin}/{destination}', [HomeController::class, 'getCrossRate']);

Route::get('/getBuyRate/{origin}/{destination}', [HomeController::class, 'findCrossRate']);
Route::get('/getSellRate/{origin}/{destination}', [HomeController::class, 'findCrossRate']);

// Route::get('/getOriginAndDestination/{sourceId}', [HomeController::class, 'getOriginAndDestination']);

Route::get('/getOriginAndDestination', [HomeController::class, 'getOriginAndDestination']);
Route::get('/getRate/{sourceId}/{origin}/{destination}', [HomeController::class, 'getCrossRate']);

// Route::get('/get-source-status', [SourceController::class, 'getStatus']);
// Route::get('/get-source-status/{source_name}/{source_time}', [SourceController::class, 'getStatus'])->name('get-source-status');
Route::get('/get-source-data/{sourceId}', [CurrencyPairController::class, 'getSourceData']);

// Route::post('/update-pair-data/{pairId}', [CurrencyPairController::class, 'updatePairData'])->name('update-pair-data');
// Route::post('/insert-new-pair', [CurrencyPairController::class, 'insertNewPair'])->name('insert-new-pair');
// Route::put('/update-pair/{pairId}', [CurrencyPairController::class, 'updatePairData']);
Route::post('/update-rate-buy/{pairId}', [CurrencyPairController::class, 'updateRateBuy'])->name('update.rate.buy');
Route::post('/update-rate-sell/{pairId}', [CurrencyPairController::class, 'updateRateSell'])->name('update.rate.sell');

// Route::put('/update2-pair/{pair}', [CurrencyPairController::class, 'update2']);

// Route::get('/getOriginAndDestination/{sourceId}', [DashboardController::class, 'getOriginAndDestination']);

// // Route::get('/getBuyRate/{sourceId}/{origin}/{destination}', [DashboardController::class, 'getBuyRate']);
// Route::get('/getBuyRate/{sourceId}/{origin}/{destination}', [DashboardController::class, 'getCrossRate']);

// Route::get('/', 'YourControllerName@index')->name('dashboard');
// Route::get('/getBuyRate/{sourceCurrency}/{targetCurrency}', 'YourControllerName@getBuyRate')->name('getBuyRate');

// Route::resource('pairs', CurrencyPairController::class);

Route::get('/about', function () {
    return view('about');
});

/**
 * Auth Routes
 */
Auth::routes();
// Auth::routes(['verify' => false]);
// Auth::routes(['verify' => true]);


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::middleware('auth')->group(function () {
        // Route::get('/', function () {
        //     return view('home');
        // });
        // Route::get('/', [HomeController::class, 'index'])->name('home');

        /**
         * Home Routes
         */
        // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        /**
         * Role Routes
         */
        Route::resource('roles', RolesController::class);
        /**
         * Permission Routes
         */
        Route::resource('permissions', PermissionsController::class);
        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

        Route::resource('currencies', CurrencyController::class);
        Route::resource('sources', SourceController::class);
        Route::post('/toggle-status/{source}', [SourceController::class, 'toggleStatus'])->name('toggle.status');
        // Route::get('/get-status/{source}', [SourceController::class, 'getStatus'])->name('source.getStatus');

        Route::get('/get-sources', [SourceController::class, 'getSources']);


        // // Route::get('/get-source-status', [SourceController::class, 'getStatus']);
        // // Route::get('/get-source-status/{source_name}/{source_time}', [SourceController::class, 'getStatus'])->name('get-source-status');
        // Route::get('/get-source-data/{sourceId}', [CurrencyPairController::class, 'getSourceData']);

        // // Route::post('/update-pair-data/{pairId}', [CurrencyPairController::class, 'updatePairData'])->name('update-pair-data');
        // // Route::post('/insert-new-pair', [CurrencyPairController::class, 'insertNewPair'])->name('insert-new-pair');
        // // Route::put('/update-pair/{pairId}', [CurrencyPairController::class, 'updatePairData']);
        // Route::post('/update-rate-buy/{pairId}', [CurrencyPairController::class, 'updateRateBuy'])->name('update.rate.buy');
        // Route::post('/update-rate-sell/{pairId}', [CurrencyPairController::class, 'updateRateSell'])->name('update.rate.sell');

        // // Route::put('/update2-pair/{pair}', [CurrencyPairController::class, 'update2']);

        // Route::get('/getOriginAndDestination/{sourceId}', [DashboardController::class, 'getOriginAndDestination']);

        // // Route::get('/getBuyRate/{sourceId}/{origin}/{destination}', [DashboardController::class, 'getBuyRate']);
        // Route::get('/getBuyRate/{sourceId}/{origin}/{destination}', [DashboardController::class, 'getCrossRate']);

        // // Route::get('/', 'YourControllerName@index')->name('dashboard');
        // // Route::get('/getBuyRate/{sourceCurrency}/{targetCurrency}', 'YourControllerName@getBuyRate')->name('getBuyRate');

        Route::resource('pairs', CurrencyPairController::class);

    
    });
});