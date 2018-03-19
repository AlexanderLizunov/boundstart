<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(['domain' => 'tasks.boundstart-site.test', 'middleware' => 'auth', 'namespace' => 'Trello'], function () {
Route::group(['domain' => 'tasks.boundstart.com', 'middleware' => 'auth', 'namespace' => 'Trello'], function () {
	Route::get('/',                         ['as' => 'trello-index',             'uses' => 'TrelloController@index']);
	Route::get('/user',                     ['as' => 'trello-dashboard',         'uses' => 'TrelloController@dashboard']);
});

//Auth
Route::auth();

//Notifications
Route::post('/send-notifications',          ['as' => 'notifications',   'uses' => 'IntegrationsController@sendRequests']);
Route::post('/start-call',                  ['as' => 'start-call',      'uses' => 'CallbackController@startCall']);

//Pages
Route::get('/what-we-do/',                  ['as' => 'what-we-do',      'uses' => 'PagesController@whatWeDo']);
Route::get('/',                             ['as' => 'index',           'uses' => 'PagesController@index']);

Route::get('/about-us/',                    ['as' => 'about',           'uses' => 'PagesController@about']);
Route::get('/sales/',                       ['as' => 'sales',           'uses' => 'PagesController@sales']);
Route::get('/photo-special-offer/',         ['as' => 'photo',           'uses' => 'PagesController@photo']);


//SERVICE ROUTES
//Route::get('/send-notifications/',           ['as' => 'notifications',   'uses' => 'IntegrationsController@sendRequests']);
//	Route::get('/persist',                       ['as' => 'persist',         'uses' => 'IntegrationsController@persist']);
//Route::post('/send-notifications',           ['as' => 'notifications',   'uses' => 'IntegrationsController@sendRequests']);

//TEMPORARY COMMENTED
//Route::get('/contacts/',                     ['as' => 'contacts',        'uses' => 'PagesController@contacts']);

//BLOG
//Route::get('/blog/',                         ['as' => 'articles',        'uses' => 'ArticlesController@index']);
//Route::get('/blog/{article}/',               ['as' => 'article',         'uses' => 'ArticlesController@show']);

//Portfolio
//Route::get('/portfolio/',                    ['as' => 'portfolio',       'uses' => 'PortfolioController@index']);
//Route::get('/portfolio/{portfolioItem}/',    ['as' => 'one-work',        'uses' => 'PortfolioController@show']);
