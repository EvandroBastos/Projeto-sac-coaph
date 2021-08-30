<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    protected $fillable = ['protocolo','matricula','nome','cpf','email','setor','telefone','assunto', 'motivo','observacao','created_at','updated_at'];



    public function Assuntos()
    {
        return $this->hasMany('App\Assunto');
    }
    public function Descricaos()
    {
        return $this->hasMany('App\Descricao');
    }
    public function Motivos()
    {
        return $this->hasMany('App\Motivo');
    }
    public function Setores()
    {
        return $this->hasMany('App\Setor');
    }
}
