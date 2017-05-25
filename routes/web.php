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
use App\Models\Site;

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/',function(){
    $site = Site::where('id',1)->first();
    return view('home')->with(['site' => $site]);
});

Route::get('/perfil/{id}', 'ProfileController@view')->name('perfil');
Route::get('/perfil/{id}/n/{name}', 'ProfileController@viewWithName')->name('perfil.name');

Route::get('/perfil/{id}/excel', 'ProfileController@export')->name('perfil.export');
Route::get('/perfil/{id}/csv', 'ProfileController@csv')->name('perfil.csv');

Route::get('/quienes-somos', function(){
  return view('about_us');
});

// Route::get('/sumate-a-la-iniciativa', function(){
//   return view('join_the_iniciative');
// });




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
    Auth::routes();
});
Route::group(['prefix'=>'administration','middleware' => ['auth']],function(){



  Route::get('/', function () {
      return view('administration.home');
  });

  Route::group(['middleware' => ['can:access-users']], function(){
    Route::resource('user', UserController::class);
  });


  Route::resource('profile', ProfileController::class);
  Route::get('profile/{id}/general', 'ProfileController@editProfile')->name('profile.edit.general');
  Route::post('profile/{id}/general', 'ProfileController@updateProfile')->name('profile.update.general');

  Route::post('publish/{id}', 'ProfileController@publish')->name('profile.publish');
  Route::post('unpublish/{id}', 'ProfileController@unpublish')->name('profile.unpublish');

  Route::get('presidencial-candidates/drafts', 'PresidencialCandidatesController@drafts')->name('candidates.president.drafts');
  Route::get('presidencial-candidates/published', 'PresidencialCandidatesController@published')->name('candidates.president.published');

  Route::get('asambleistas-candidates/drafts', 'DeputyCandidatesController@drafts')->name('candidates.asambleistas.drafts');
  Route::get('asambleistas-candidates/published', 'DeputyCandidatesController@published')->name('candidates.asambleistas.published');

  Route::get('asambleistas/drafts', 'DeputyController@drafts')->name('asambleistas.drafts');
  Route::get('asambleistas/published', 'DeputyController@published')->name('asambleistas.published');

  Route::get('generalComptroller/drafts', 'GeneralComptrollerController@drafts')->name('general_comptroller.drafts');
  Route::get('generalComptroller/published', 'GeneralComptrollerController@published')->name('general_comptroller.published');

  Route::get('ombudsman/drafts', 'OmbudsmanController@drafts')->name('ombudsman.drafts');
  Route::get('ombudsman/published', 'OmbudsmanController@published')->name('ombudsman.published');

  Route::get('banner/edit', 'SiteController@edit')->name('banner.edit');
  Route::post('banner/update/{id}', 'SiteController@update')->name('banner.update');

  Route::resource('position', PositionController::class);
  Route::resource('judgment_type', JudgmentTypeController::class);
  Route::resource('political_party', PoliticalPartyController::class);
  Route::get('/message/edit', 'MessageController@edit')->name("message.edit");
  Route::put('/message/update', 'MessageController@update')->name("message.update");

  Route::get('public-servants/drafts', 'PublicServantController@drafts')->name('public-servants.drafts');
  Route::get('public-servants/published', 'PublicServantController@published')->name('public-servants.published');


});
