<?php
use App\Events\WebSocketsDemoEvent;
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

Route::get('/', function () {
    broadcast(new WebSocketsDemoEvent('some data'));
    return view('welcome');
});

Route::get('/chats', 'ChatsController@index');

Route::get('/messages', 'ChatsController@fetch');

Route::post('/messages', 'ChatsController@send');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
