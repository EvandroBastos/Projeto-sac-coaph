<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descricao extends Model
{
    protected $fillable = ['observacao','created_at','updated_at'];

     public function Protocolo(){
         return $this->belongsTo('App\Protocolo');
     }
}
