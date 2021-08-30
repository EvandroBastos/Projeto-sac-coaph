<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
     protected $fillable = ['setor','created_at','updated_at'];

     public function Protocolo(){
         return $this->belongsTo('App\Protocolo');
     }
}
