<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = ['setor','motivo','assunto','observacao'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
