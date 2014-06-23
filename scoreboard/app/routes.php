<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
use Illuminate\Http\JsonResponse;

Route::pattern('player_id', '\d+');
Route::pattern('points', '[0-9]{1,2}');

Route::get('/', 'ScoreboardController@getIndex');
Route::get('/about', 'ScoreboardController@getAbout');

// =============================================
// API ROUTES ==================================
// =============================================
Route::group(
    ['prefix' => 'api'],
    function () {

        Route::get('players', 'PlayerApiController@getIndex');

        Route::any('players/{player_id}/award/{points}', 'PlayerApiController@awardPointsToPlayer');

    }
);

/**
 * CATCH ALL ROUTE =============================
 *
 * all routes that are not home or api will be redirected to the scoreboard
 *
 */
App::missing(
    function ($exception) {
        // Run controller and method
        $app = app();
        $controller = $app->make('ScoreboardController');

        return $controller->callAction('getIndex', $parameters = []);
    }
);
