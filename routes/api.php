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
Route::get('/principals', "Api\PrincipalController@getPrincipals");
Route::get('/ejecutives', "Api\EjecutiveController@getEjecutives");

Route::get('/deputys/{isCandidate}', "Api\DeputyController@getDeputys");
Route::get('/generalComptrollers', "Api\GeneralComptrollerController@getGeneralComptroller");
Route::get('/ombudsmen', "Api\OmbudsmanController@getOmbudsmen");
Route::get('/publicServants', "Api\PublicServantController@getPublicServants");

Route::get('/citizens', "Api\CitizenParticipationController@getCitizens");
Route::get('/electorals', "Api\ElectoralController@getElectorals");
Route::get('/judicials', "Api\JudicialController@getJudicials");
Route::get('/legislatives', "Api\LegislativeController@getLegislatives");
Route::get('/others', "Api\OtherAuthoritiesController@getOthers");
Route::get('/publics', "Api\PublicCompetitionController@getPublics");


Route::group(['prefix'=>'admin'],function(){
  Route::get('/dashboard', 'Api\AdminController@dashboard');
});
