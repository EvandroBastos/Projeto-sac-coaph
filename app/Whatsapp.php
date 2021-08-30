<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{
    protected $fillable = ['recebidos','enviados','created_at','updated_at'];
}
