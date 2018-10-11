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
// Route::get('/', 'Site\HomeController@index')->name('home');
// Route::get('/doeagora/pagamento', 'Site\DoeAgoraController@pagamento')->name('doeagora.pagamento');
// Route::post('/doeagora/pagseguro', 'Site\DoeAgoraController@pagseguro')->name('doeagora.pagseguro');
// Route::post('/doeagora/pedido', 'Site\DoeAgoraController@pedido')->name('doeagora.pedido');
// Route::post('/doeagora/boleto', 'Site\DoeAgoraController@boleto')->name('doeagora.boleto');

// Route::get('/doeagora','Site\DoeAgoraController@index')->name('doeagora');
// Route::post('/doeagora','Site\DoeAgoraController@store')->name('doeagora.store');

// Route::get('/contato', 'Site\ContatoController@index')->name('sitecontato');
// Route::post('/contato','Site\ContatoController@store')->name('contato.store');

// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
//    	Route::group(['middleware' => 'admin.user'], function() {
// 		Route::get('home', ['uses' => 'Admin\HomeController@index', 'as' => 'admin.home.index']);
// 	    Route::post('banners/{idPosition}', ['uses' => 'Admin\BannerController@store', 'as' => 'admin.banners.store']);
// 	    Route::put('banners/{idPosition}', ['uses' => 'Admin\BannerController@updateOrDelete', 'as' => 'admin.banners.updateOrDelete']);
// 	    Route::post('midias/{idGallery}', ['uses' => 'Admin\GalleryMidiasController@store', 'as' => 'admin.gallery_midias.store']);
// 	    Route::put('midias/{idGallery}', ['uses' => 'Admin\GalleryMidiasController@updateOrDelete', 'as' => 'admin.gallery_midias.updateOrDelete']);
//      Route::get('midias/gethtml/{idGallery}', ['uses' => 'Admin\GalleryMidiasController@getHtml', 'as' => 'admin.gallery_midias.get_html']);
// 	    Route::post('itens/{idAccordion}', ['uses' => 'Admin\AccordionItemController@storeOrUpdate', 'as' => 'admin.accordion_item.storeOrUpdate']);
// 	    Route::get('highlight/ajaxgetmodel', 'Admin\HighlightsController@ajaxGetModel')->name('admin.highlights.ajaxgetmodel');
//      Route::get('galeria/ajaxgetlist', ['uses' => 'Admin\GalleryController@ajaxGetList', 'as' => 'admin.gallery.ajax_get_list']);
//    	});
// });
// Route::group(['as' => 'site.', 'prefix' => ''], function() {
// 	Route::get('/{slug}', 'Site\PageController@show')->name('page');
// });
Auth::routes(); 

Route::get('/', 'HomeController@index')->name('index');
Route::get('/produto/{id}', 'HomeController@produto')->name('produto');
Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index');
Route::get('/carrinho/adicionar', function() {
    return redirect()->route('index');
});
Route::post('/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');
Route::delete('/carrinho/remover', 'CarrinhoController@remover')->name('carrinho.remover');
Route::post('/carrinho/concluir', 'CarrinhoController@concluir')->name('carrinho.concluir');
Route::get('/carrinho/compras', 'CarrinhoController@compras')->name('carrinho.compras');
Route::post('/carrinho/cancelar', 'CarrinhoController@cancelar')->name('carrinho.cancelar');
Route::post('/carrinho/desconto', 'CarrinhoController@desconto')->name('carrinho.desconto');

// rotas do admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('produtos', 'Admin\ProdutoController@index')->name('admin.produtos');
    Route::get('produtos/adicionar', 'Admin\ProdutoController@adicionar')->name('admin.produtos.adicionar');
    Route::post('produtos/salvar', 'Admin\ProdutoController@salvar')->name('admin.produtos.salvar');
    Route::get('produtos/editar/{id}', 'Admin\ProdutoController@editar')->name('admin.produtos.editar');
    Route::put('produtos/atualizar/{id}', 'Admin\ProdutoController@atualizar')->name('admin.produtos.atualizar');
    Route::get('produtos/deletar/{id}', 'Admin\ProdutoController@deletar')->name('admin.produtos.deletar');

    Route::get('cupons', 'Admin\CupomDescontoController@index')->name('admin.cupons');
    Route::get('cupons/adicionar', 'Admin\CupomDescontoController@adicionar')->name('admin.cupons.adicionar');
    Route::post('cupons/salvar', 'Admin\CupomDescontoController@salvar')->name('admin.cupons.salvar');
    Route::get('cupons/editar/{id}', 'Admin\CupomDescontoController@editar')->name('admin.cupons.editar');
    Route::put('cupons/atualizar/{id}', 'Admin\CupomDescontoController@atualizar')->name('admin.cupons.atualizar');
    Route::get('cupons/deletar/{id}', 'Admin\CupomDescontoController@deletar')->name('admin.cupons.deletar');

});