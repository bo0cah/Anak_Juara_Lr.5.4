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
Route::group(['middleware' => 'web'], function(){
    
    Route::auth();
    
    Route::get('/',['uses' => 'PengajuController@index','as' => 'pengajuan.index' ]);

    Route::get('pengajuan-form',['uses' => 'PengajuController@form','as' => 'pengajuan-form' ]);

    Route::post('pengajuan-form',['uses' => 'PengajuController@simpan','as' => 'pengajuan-simpan']);

    Route::get('unduhExcel/{ext}', 'PengajuController@unduhExcel');

    Route::post('unggahExcel', 'PengajuController@unggahExcel');

    Route::get('profil/{id}',[ 'uses' => 'PengajuController@profil','as' => 'profil']);

    Route::get('profil-keluar','DataKeluarController@index');

    Route::get('penerima', 'PenerimaController@index');

    Route::get('doc}', function () {
        return view('documentation/document');
    });

    Route::get('/home', 'HomeController@index');

    Route::get('/administrator', function () {
        echo '<h1>Hai '.Auth::user()->name;
    })->middleware('isAdmin');
});

Route::get('users/{id}', function ($id) {
    $user = App\Pengajuan::find("$id"); 
    echo $user->nama."<br>";
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
