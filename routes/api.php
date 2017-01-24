<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/binomials', "Api\BinomialController@getBinomials");
Route::get('/deputys/{isCandidate}', "Api\DeputyController@getDeputys");
Route::get('/generalComptrollers', "Api\GeneralComptrollerController@getGeneralComptroller");
Route::get('/ombudsmen', "Api\OmbudsmanController@getOmbudsmen");
Route::get('/publicServants', "Api\PublicServantController@getPublicServants");


Route::group(['prefix'=>'admin'],function(){
  Route::get('/dashboard', 'Api\AdminController@dashboard');
});
