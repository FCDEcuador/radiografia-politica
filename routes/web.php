<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/perfil/{id}', function ($id) {
    return view('perfil');
});

Route::get('/home', 'HomeController@index');




/*
|--------------------------------------------------------------------------
| Administration Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix'=>'administration'],function(){

  Route::get('/', function () {
      return view('administration.home');
  });

  Route::group(['middleware' => ['can:access-users']], function(){
    Route::resource('user', UserController::class);
  });


  Route::resource('profile', ProfileController::class);

  Route::get('presidencial-candidates/drafts', 'PresidencialCandidatesController@drafts');
  Route::get('presidencial-candidates/published', 'PresidencialCandidatesController@published');

  Route::get('asambleistas-candidates/drafts', 'DeputyCandidatesController@drafts');
  Route::get('asambleistas-candidates/published', 'DeputyCandidatesController@published');

  Route::get('asambleistas/drafts', 'DeputyController@drafts');
  Route::get('asambleistas/published', 'DeputyController@published');

  Route::get('public-servants/drafts', 'PublicServantController@drafts');
  Route::get('public-servants/published', 'PublicServantController@published');

  Auth::routes();
});
