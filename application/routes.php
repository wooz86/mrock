<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

// Admin controllers
Route::controller('admin.home');
Route::controller('admin.gallery');
Route::controller('admin.gigs');
Route::controller('admin.venues');
Route::controller('admin.biography');
Route::controller('admin.members');
Route::controller('admin.user');

// Front controllers
Route::controller('home');
Route::controller('music');
Route::controller('biography');
Route::controller('gigs');
Route::controller('gallery');
Route::controller('contact');
Route::controller('user');


// Admin routes 
Route::any('admin*', array('before' => 'auth'));
Route::get('admin/user/(:num)/edit', 'admin.user@edit');

Route::get('admin/home/edit/intro_text', 'admin.home@edit_intro_text');
Route::post('admin/home/edit/intro_text', 'admin.home@update_intro_text');
Route::get('admin/home/edit/intro_image', 'admin.home@edit_intro_image');
Route::post('admin/home/edit/intro_image', 'admin.home@update_intro_image');
Route::get('admin/home/edit/intro_video', 'admin.home@edit_intro_video');
Route::post('admin/home/edit/intro_video', 'admin.home@update_intro_video');

Route::get('admin/gig/(:num)/edit', 'admin.gigs@edit');
Route::post('admin/gig/save', 'admin.gigs@save');

Route::get('admin/venue/(:num)/edit', 'admin.venues@edit');
Route::post('admin/venue/update', 'admin.venues@update');
Route::post('admin/venue/save', 'admin.venues@save');

Route::get('admin/biography/edit/band_text', 'admin.biography@edit_band_text');
Route::post('admin/biography/edit/band_text', 'admin.biography@update_band_text');
Route::get('admin/biography/edit/band_image', 'admin.biography@edit_band_image');
Route::post('admin/biography/edit/band_image', 'admin.biography@update_band_image');


// Front routes
Route::get('user/login', 'user@index');

Route::get('login', 'user@index');
Route::post('login', 'user@login');

Route::get('logout', 'user@logout');
Route::post('logout', 'user@logout');

Route::get('contact/post_contact_form', 'contact@index');
Route::post('contact/post_contact_form', 'contact@post_contact_form');






/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

// Event::listen('laravel.query', function($sql)
// {
// 	var_dump($sql);
// });

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

Route::filter('pattern: admin*', 'auth');