<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presencial extends Model
{
    protected $fillable = ['protocolo','digitro','matricula','nome','cpf','email','setor','telefone','assunto', 'motivo','observacao','documento','created_at','updated_at'];
}
