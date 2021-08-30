<?php

use App\Http\Controllers\TarefasController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


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
    return view('welcome');
})->middleware('auth');



Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('clients','ClientController');
    Route::resource('presencials','PresencialController');
    Route::resource('whatsapps','WhatsappController');
    Route::resource('emails','EmailController');
    Route::get('chart', 'ChartController@graficarClientes')->name('clients.chart');
    Route::get('chart1', 'ChartController@grafico1')->name('presencials.chart1');
    Route::get('chart1', 'ChartController@grafico1')->name('clients.chart1');
    Route::get('chart2', 'ChartController@graficoWhatsapp')->name('whatsapps.chart2');
    Route::get('chart3', 'ChartController@graficoEmail')->name('emails.chart3');

    Route::get('master', 'FullcalendarController@index')->name('fullcalendar.master');
    Route::get('/load-events', 'EventController@loadEvents')->name('routeLoadEvents');
    Route::put('/event-update', 'EventController@update')->name('routeEventUpdate');
    Route::post('/event-store', 'EventController@store')->name('routeEventStore');
    Route::delete('/event-destroy', 'EventController@destroy')->name('routeEventDelete');

    Route::delete('/fast-event-destroy', 'FastEventController@destroy')->name('routeFastEventDelete');
    Route::put('/fast-event-update', 'FastEventController@update')->name('routeFastEventUpdate');
    Route::post('/fast-event-store', 'FastEventController@store')->name('routeFastEventStore');

    Route::get('power_bi', 'PowerBIController@index')->name('powerbi.power_bi');

    Route::get('/file/download/{documento}', 'ClientController@download');



});









