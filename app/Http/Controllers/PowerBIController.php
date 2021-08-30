<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PowerBIController extends Controller
{
    public function index()
    {      

        return view('powerbi.power_bi');
    }
}
