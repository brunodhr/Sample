<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests\EnviarContatoRequest;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Models\Contact;
use App\Mail\ContactForm;
use Mail;

class ContatoController extends Controller
{

	public function index(){
		
        return view('site.contato.index');
	}

	public function create(){
    	return view('contato');
    }
 
	/*
	  Insere a mensagem no banco de dados
	  */
    	public function store(EnviarContatoRequest $request){

		// dd($request->all());

		$contato = new Contact();
		$contato->name = $request->nome;
		$contato->email = $request->email;
		$contato->phone = $request->telefone;
		$contato->message = $request->mensagem;
 
		$contato->save();
 
        Mail::to('brunofilipe@criasol.com.br')->send(new ContactForm($contato));
        

		return redirect()
                    ->route('sitecontato')
                    ->with([
                        'message' => 'Contato registrado!',
                        'alertType' => 'bg-success'
                    ]);

	}

    public function lista(){
    	return view('lista', array('contatos' => Contact::all()));
	}
}


