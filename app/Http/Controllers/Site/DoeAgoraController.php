<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests\EnviarDoacaoRequest;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Models\DoeAgora;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\components\CarrinhoComponent;
use PagSeguro;
class DoeAgoraController extends Controller
{
	
	public function index(){
		return view('site.doeagora.index');
	}
	public function pagseguro(){
		$email = 'brunofilipe@criasol.com.br';
		$token = 'D8BD006304BD4077BE49C3975699467B';
		
		$Url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=".$email."&token=".$token."";
		$Curl = curl_init($Url);
		curl_setopt($Curl, CURLOPT_HTTPHEADER, array('Content-Type: application/xml; charset=UTF-8'));
		curl_setopt($Curl, CURLOPT_POST, 1);
		curl_setopt($Curl, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);
		$Retorno=curl_exec($Curl);
		curl_close($Curl);
		
		$Xml=simplexml_load_string($Retorno);
		echo json_encode($Xml);
	}

	public function pagamento(){
		if (session()->has('doacao')) {
			return view('site.doeagora.show');
		} 

		return redirect()->route('doeagora');
	}
	public function pedido(){
		$email = 'brunofilipe@criasol.com.br';
		$token = 'D8BD006304BD4077BE49C3975699467B';

		$TokenCard=filter_input(INPUT_POST,'TokenCard',FILTER_SANITIZE_SPECIAL_CHARS);
		$HashCard=filter_input(INPUT_POST,'HashCard',FILTER_SANITIZE_SPECIAL_CHARS);

		$QtdParcelas=filter_input(INPUT_POST,'QtdParcelas',FILTER_SANITIZE_SPECIAL_CHARS);
		$ValorParcelas=filter_input(INPUT_POST,'ValorParcelas',FILTER_SANITIZE_SPECIAL_CHARS);

		// dd($TokenCard,$HashCard,$QtdParcelas,$ValorParcelas);
		$CPFCartao=filter_input(INPUT_POST,'CPFCartao',FILTER_SANITIZE_SPECIAL_CHARS);
		$NomeComprador=filter_input(INPUT_POST,'NomeComprador',FILTER_SANITIZE_SPECIAL_CHARS);
		$CPFComprador=filter_input(INPUT_POST,'CPFComprador',FILTER_SANITIZE_SPECIAL_CHARS);
		$DDDComprador=filter_input(INPUT_POST,'DDDComprador',FILTER_SANITIZE_SPECIAL_CHARS);
		$TelefoneComprador=filter_input(INPUT_POST,'TelefoneComprador',FILTER_SANITIZE_SPECIAL_CHARS);
		$NomeCartao=filter_input(INPUT_POST,'NomeCartao',FILTER_SANITIZE_SPECIAL_CHARS);
		$Endereco=filter_input(INPUT_POST,'Endereco',FILTER_SANITIZE_SPECIAL_CHARS);
		$Numero=filter_input(INPUT_POST,'Numero',FILTER_SANITIZE_SPECIAL_CHARS);
		$Complemento=filter_input(INPUT_POST,'Complemento',FILTER_SANITIZE_SPECIAL_CHARS);
		$Bairro=filter_input(INPUT_POST,'Bairro',FILTER_SANITIZE_SPECIAL_CHARS);
		$Cidade=filter_input(INPUT_POST,'Cidade',FILTER_SANITIZE_SPECIAL_CHARS);
		$UF=filter_input(INPUT_POST,'UF',FILTER_SANITIZE_SPECIAL_CHARS);
		$CEP=filter_input(INPUT_POST,'CEP',FILTER_SANITIZE_SPECIAL_CHARS);

		$Data["email"]=$email;
		$Data["token"]=$token;
		$Data["paymentMode"]="default";
		$Data["paymentMethod"]="creditCard";
		$Data["receiverEmail"]=$email;
		$Data["currency"]="BRL";
		$Data["itemId1"] = 1;
		$Data["itemDescription1"] = 'Website';
		$Data["itemAmount1"] = '500.00';
		$Data["itemQuantity1"] = 1;
		$Data["notificationURL="]="https://www.meusite.com.br/notificacao.php";
		$Data["reference"]="83783783737";
		$Data["senderName"]=$NomeComprador;
		$Data["senderCPF"]=$CPFComprador;
		$Data["senderAreaCode"]='31';
		$Data["senderPhone"]=$TelefoneComprador;
		$Data["senderEmail"]="c06958753014674149613@sandbox.pagseguro.com.br";
		$Data["senderHash"]=$HashCard;
		$Data["shippingType"]="1";
		$Data["shippingAddressStreet"]=$Endereco;
		$Data["shippingAddressNumber"]=$Numero;
		$Data["shippingAddressComplement"]=$Complemento;
		$Data["shippingAddressDistrict"]=$Bairro;
		$Data["shippingAddressPostalCode"]=$CEP;
		$Data["shippingAddressCity"]=$Cidade;
		$Data["shippingAddressState"]='MG';
		$Data["shippingAddressCountry"]="BRA";
		$Data["shippingType"]="1";
		$Data["shippingCost"]="0.00";
		$Data["creditCardToken"]=$TokenCard;
		$Data["installmentQuantity"]=$QtdParcelas;
		$Data["installmentValue"]=$ValorParcelas;
		$Data["noInterestInstallmentQuantity"]=2;
		$Data["creditCardHolderName"]=$NomeCartao;
		$Data["creditCardHolderCPF"]=$CPFCartao;
		$Data["creditCardHolderBirthDate"]='27/10/1987';
		$Data["creditCardHolderAreaCode"]='31';
		$Data["creditCardHolderPhone"]=$TelefoneComprador;
		$Data["billingAddressStreet"]=$Endereco;
		$Data["billingAddressNumber"]=$Numero;
		$Data["billingAddressComplement"]=$Complemento;
		$Data["billingAddressDistrict"]=$Bairro;
		$Data["billingAddressPostalCode"]=$CEP;
		$Data["billingAddressCity"]=$Cidade;
		$Data["billingAddressState"]='MG';
		$Data["billingAddressCountry"]="BRA";


		$BuildQuery=http_build_query($Data);
		$Url="https://ws.sandbox.pagseguro.uol.com.br/v2/transactions";
		
		$Curl=curl_init($Url);
		curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
		curl_setopt($Curl,CURLOPT_POST,true);
		curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
		$Retorno=curl_exec($Curl);
		curl_close($Curl);
		
		$Xml=simplexml_load_string($Retorno);
		var_dump($Xml);
	}
	public function boleto(){

		$email = 'brunofilipe@criasol.com.br';
		$token = 'D8BD006304BD4077BE49C3975699467B';
		
		$TokenCard=$_POST['TokenCard'];
		$HashCard=$_POST['HashCard'];
		$QtdParcelas=filter_input(INPUT_POST,'QtdParcelas',FILTER_SANITIZE_SPECIAL_CHARS);
		$ValorParcelas=filter_input(INPUT_POST,'ValorParcelas',FILTER_SANITIZE_SPECIAL_CHARS);
		$CPFCartao=filter_input(INPUT_POST,'CPFCartao',FILTER_SANITIZE_SPECIAL_CHARS);
		$NomeComprador=filter_input(INPUT_POST,'NomeComprador',FILTER_SANITIZE_SPECIAL_CHARS);
		$CPFComprador=filter_input(INPUT_POST,'CPFComprador',FILTER_SANITIZE_SPECIAL_CHARS);
		$DDDComprador=filter_input(INPUT_POST,'DDDComprador',FILTER_SANITIZE_SPECIAL_CHARS);
		$TelefoneComprador=filter_input(INPUT_POST,'TelefoneComprador',FILTER_SANITIZE_SPECIAL_CHARS);
		$NomeCartao=filter_input(INPUT_POST,'NomeCartao',FILTER_SANITIZE_SPECIAL_CHARS);
		$Endereco=filter_input(INPUT_POST,'Endereco',FILTER_SANITIZE_SPECIAL_CHARS);
		$Numero=filter_input(INPUT_POST,'Numero',FILTER_SANITIZE_SPECIAL_CHARS);
		$Complemento=filter_input(INPUT_POST,'Complemento',FILTER_SANITIZE_SPECIAL_CHARS);
		$Bairro=filter_input(INPUT_POST,'Bairro',FILTER_SANITIZE_SPECIAL_CHARS);
		$Cidade=filter_input(INPUT_POST,'Cidade',FILTER_SANITIZE_SPECIAL_CHARS);
		$UF=filter_input(INPUT_POST,'UF',FILTER_SANITIZE_SPECIAL_CHARS);
		$CEP=filter_input(INPUT_POST,'CEP',FILTER_SANITIZE_SPECIAL_CHARS);

		$Data["email"]=$email;
		$Data["token"]=$token;
		$Data["paymentMode"]="default";
		$Data["paymentMethod"]="boleto";
		$Data["receiverEmail"]=$email;
		$Data["currency"]="BRL";
		$Data["itemId1"] = 1;
		$Data["itemDescription1"] = 'Website';
		$Data["itemAmount1"] = '500.00';
		$Data["itemQuantity1"] = 1;
		$Data["notificationURL="]="https://www.meusite.com.br/notificacao.php";
		$Data["reference"]="83783783737";
		$Data["senderName"]=$NomeComprador;
		$Data["senderCPF"]=$CPFComprador;
		$Data["senderAreaCode"]=$DDDComprador;
		$Data["senderPhone"]=$TelefoneComprador;
		$Data["senderEmail"]="c06958753014674149613@sandbox.pagseguro.com.br";
		$Data["senderHash"]=$HashCard;
		$Data["shippingAddressStreet"]=$Endereco;
		$Data["shippingAddressNumber"]=$Numero;
		$Data["shippingAddressComplement"]=$Complemento;
		$Data["shippingAddressDistrict"]=$Bairro;
		$Data["shippingAddressPostalCode"]=$CEP;
		$Data["shippingAddressCity"]=$Cidade;
		$Data["shippingAddressState"]=$UF;
		$Data["shippingAddressCountry"]="BRA";
		$Data["shippingType"]="1";
		$Data["shippingCost"]="0.00";

		$BuildQuery=http_build_query($Data);
		$Url="https://ws.sandbox.pagseguro.uol.com.br/v2/transactions";

		$Curl=curl_init($Url);
		curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
		curl_setopt($Curl,CURLOPT_POST,true);
		curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
		$Retorno=curl_exec($Curl);
		curl_close($Curl);

		$Xml=simplexml_load_string($Retorno);
		var_dump($Xml);
		// echo "
		// <script>
		// 	window.location.href='$Xml->paymentLink';
		// </script>";
	}
 
	public function store(EnviarDoacaoRequest $request){
		// curl https://ws.sandbox.pagseguro.uol.com.br/v2/sessions/ -d "email=brunofilipe@criasol.com.br&token=D8BD006304BD4077BE49C3975699467B" -X POST https://ws.sandbox.pagseguro.uol.com.br/v2/sessions/
		// dd($request->all());
		$doacao = DoeAgora::create($request->all());
		// dd($doacao->toArray());
		session(['doacao' => $doacao]);
		return redirect()->route('doeagora.pagamento');
	}

    public function lista(){
    	return view('lista', array('contatos' => Contact::all()));
	}
}


