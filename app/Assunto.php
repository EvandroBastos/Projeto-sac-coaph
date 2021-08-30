<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    protected $fillable = ['assunto','created_at','updated_at'];

    public function Protocolo(){
        return $this->belongsTo('App\Protocolo');
    }
}
