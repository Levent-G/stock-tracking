<?php

use Illuminate\Support\Facades\Route;

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


/* backend routes*/

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('/cikis', 'App\Http\Controllers\Front\LoginController@logout')->name('logout');
});


Route::get('/filtre/{depoName}', 'App\Http\Controllers\Front\DepoController@filtre1')->name('filtre1');





/* frontend routes*/

Route::get('/homepage', 'App\Http\Controllers\Front\HomepageController@index')->name('homepage');
Route::post('/anasayfa', 'App\Http\Controllers\Front\LoginController@loginPost')->name('admin.login.post');
Route::get('/UrunListesi', 'App\Http\Controllers\Front\UrunlerController@urunlerlist')->name('UrunListesi');
Route::get('/UrunListesi1', 'App\Http\Controllers\Front\UrunlerController@barkod')->name('barkod');
Route::get('/UrunIncele/{urunSeriNo?}', 'App\Http\Controllers\Front\UrunlerController@incele')->name('urunIncele');
Route::get('/UrunDepo/{depoName}', 'App\Http\Controllers\Front\DepoController@depoUrunleri')->name('UrunDepo');
Route::get('/qrEkle/{urunSeriNo?}', 'App\Http\Controllers\Front\UrunlerController@qrEkle')->name('qrEkle');
Route::get('/qrKontrol', 'App\Http\Controllers\Front\UrunlerController@qrKontrol')->name('qrKontrol');
Route::POST('/qrBilgiler', 'App\Http\Controllers\Front\UrunlerController@qrBilgiler')->name('qrBilgiler');
Route::get('/urunEkle', 'App\Http\Controllers\Front\HomepageController@urunEkle')->name('urunEkle');
Route::POST('/urunEkle', 'App\Http\Controllers\Front\UrunlerController@urunEklemeIslemi')->name('urunEklemeIslemi');
Route::POST('/urunGuncellemeIslemeri', 'App\Http\Controllers\Front\UrunlerController@urunGuncellemeIslemeri')->name('urunGuncellemeIslemeri');
Route::get('/stokDurum', 'App\Http\Controllers\Front\UrunlerController@filtre')->name('stokDurum');
Route::get('/stokYenile/{urunSeriNo?}', 'App\Http\Controllers\Front\UrunlerController@stokYenile')->name('stokYenile');
Route::post('/stokYenileFunction/{urunSeriNo?}', 'App\Http\Controllers\Front\UrunlerController@stokYenileFunction')->name('stokYenileFunction');

Route::get('/faturaBilgi', 'App\Http\Controllers\Front\UrunlerController@faturaBilgi')->name('faturaBilgi');
Route::post('/faturaBilgiTable', 'App\Http\Controllers\Front\UrunlerController@faturaBilgiTable')->name('faturaBilgiTable');

Route::get('/stokGecmisi', 'App\Http\Controllers\Front\UrunlerController@stokGecmisi')->name('stokGecmisi');
Route::post('/stokGecmisiTable', 'App\Http\Controllers\Front\UrunlerController@stokGecmisiTable')->name('stokGecmisiTable');

Route::get('/stokMaliyeti', 'App\Http\Controllers\Front\UrunlerController@stokMaliyeti')->name('stokMaliyeti');
Route::post('/stokMaliyetTable', 'App\Http\Controllers\Front\UrunlerController@stokMaliyetTable')->name('stokMaliyetTable');
