<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
# route for the main page
Route::get('/', 'WbController@index');

# route for logs which is only accessible in local server
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
