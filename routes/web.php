<?php
use Illuminate\Support\Facades\Input;


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
Route::get('/', 'Site\HomeController@index')->name('home');


Route::get('/doeagora/pagamento', 'Site\DoeAgoraController@pagamento')->name('doeagora.pagamento');

Route::post('/doeagora/pagseguro', 'Site\DoeAgoraController@pagseguro')->name('doeagora.pagseguro');

Route::post('/doeagora/pedido', 'Site\DoeAgoraController@pedido')->name('doeagora.pedido');

Route::post('/doeagora/boleto', 'Site\DoeAgoraController@boleto')->name('doeagora.boleto');


Route::get('/doeagora','Site\DoeAgoraController@index')->name('doeagora');

Route::post('/doeagora','Site\DoeAgoraController@store')->name('doeagora.store');


Route::get('/contato', 'Site\ContatoController@index')->name('sitecontato');

Route::post('/contato','Site\ContatoController@store')->name('contato.store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

   	Route::group(['middleware' => 'admin.user'], function() {
		Route::get('home', ['uses' => 'Admin\HomeController@index', 'as' => 'admin.home.index']);

	    Route::post('banners/{idPosition}', ['uses' => 'Admin\BannerController@store', 'as' => 'admin.banners.store']);
	    Route::put('banners/{idPosition}', ['uses' => 'Admin\BannerController@updateOrDelete', 'as' => 'admin.banners.updateOrDelete']);

	    Route::post('midias/{idGallery}', ['uses' => 'Admin\GalleryMidiasController@store', 'as' => 'admin.gallery_midias.store']);
	    Route::put('midias/{idGallery}', ['uses' => 'Admin\GalleryMidiasController@updateOrDelete', 'as' => 'admin.gallery_midias.updateOrDelete']);
        Route::get('midias/gethtml/{idGallery}', ['uses' => 'Admin\GalleryMidiasController@getHtml', 'as' => 'admin.gallery_midias.get_html']);

	    Route::post('itens/{idAccordion}', ['uses' => 'Admin\AccordionItemController@storeOrUpdate', 'as' => 'admin.accordion_item.storeOrUpdate']);

	    Route::get('highlight/ajaxgetmodel', 'Admin\HighlightsController@ajaxGetModel')->name('admin.highlights.ajaxgetmodel');
        Route::get('galeria/ajaxgetlist', ['uses' => 'Admin\GalleryController@ajaxGetList', 'as' => 'admin.gallery.ajax_get_list']);
   	});
});

Route::group(['as' => 'site.', 'prefix' => ''], function() {
	Route::get('/{slug}', 'Site\PageController@show')->name('page');
});
