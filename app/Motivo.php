<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    protected $fillable = ['motivo','created_at','updated_at'];

    public function Protocolo(){
        return $this->belongsTo('App\Protocolo');
    }
}
