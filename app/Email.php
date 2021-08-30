<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['recebidos','enviados','created_at','updated_at'];
}
