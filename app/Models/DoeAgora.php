<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoeAgora extends Model
{
    protected $table = 'doeagora';
    protected $fillable = ['tipocontribuicao','contribuicao','nome','email','numero1','numero2','cpf','cep','cidade','estado','bairro','logradouro','complemento','numero'];
}
