<?php

use App\Http\Middleware\AdminMiddleware;
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
Route::group(['middleware' => ['web']], function () {
	
	Route::auth();

	Route::get('/',['uses' => 'PengajuController@index','as' => 'Pengaju.index' ]);

	Route::get('Pengaju-form',['uses' => 'PengajuController@form','as' => 'Pengaju-form' ]);

	Route::post('Pengaju-form',['uses' => 'PengajuController@simpan','as' => 'Pengaju-simpan']);

	Route::get('unduhExcel/{ext}', 'PengajuController@unduhExcel');

	Route::post('unggahExcel', 'PengajuController@unggahExcel');

	Route::get('profil/{id}',[ 'uses' => 'PengajuController@profil','as' => 'profil']);

	Route::get('cetakProfil/{id}',[ 'uses' => 'PengajuController@cetakProfil','as' => 'cetakProfil']);

	Route::get('data-keluar','DataKeluarController@index');

	Route::get('penerima', 'PenerimaController@index');

	Route::get('doc', function () {
	    return view('documentation/document');
	});

	Route::get('home', 'HomeController@index');


	Route::get('/administrator', function () {
	    echo '<h1>Hai</h1>';
	})->middleware('admin');

});

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
