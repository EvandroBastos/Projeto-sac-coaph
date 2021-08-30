<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Presencial;
use App\Whatsapp;
use App\Email;
use DB;
use Redirect,Response;
use Carbon\Carbon;
use App\User;



class ChartController extends Controller
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function graficarClientes()
    {
        $clients = Client::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("day(created_at)"))
                    ->pluck('count');
         $record = Client::select(\DB::raw("COUNT(protocolo) as count"), \DB::raw("date(created_at) as day_name"))
                   ->groupBy('day_name')
                   ->orderBy('day_name')
                   ->get();
        $data = [];
        foreach($record as $row) {
        $data['label'][] = $row->day_name;
        $data['data'][] = (int) $row->count;
                                 }
        $data['chart_data'] = json_encode($data);

        $ssss = \DB::select('SELECT setor, count(protocolo) as contar FROM clients GROUP BY setor ORDER BY count(protocolo) DESC');

        return view('clients.chart', compact('clients', 'ssss'), $data);
    }



    public function grafico1()
    {
        $presencials = Presencial::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("day(created_at)"))
        ->pluck('count');
        $record = Presencial::select(\DB::raw("COUNT(protocolo) as count"), \DB::raw("date(created_at) as day_name"))
       ->groupBy('day_name')
       ->orderBy('day_name')
       ->get();
       $data = [];
       foreach($record as $row) {
       $data['label'][] = $row->day_name;
       $data['data'][] = (int) $row->count;
                  }
       $data['chart_data'] = json_encode($data);
       $ssss = \DB::select('SELECT setor, count(protocolo) as contar FROM presencials GROUP BY setor ORDER BY count(protocolo) DESC');
       return view('presencials.chart1', compact('presencials', 'ssss'), $data);
    }
    public function graficoWhatsapp()
    {
     $record = Whatsapp::select(\DB::raw("SUM(recebidos) as count1"),\DB::raw("SUM(enviados) as count2"), \DB::raw("date(created_at) as day_name"))
          ->groupBy('day_name')
          ->orderBy('day_name')
          ->get();
          $data = [];
     foreach($record as $row) {
     $data['data'][] = $row->day_name;
     $data['qtd1'][] = (int) $row->count1;
     $data['qtd2'][] = (int) $row->count2;
                              }
     $data['chart_data'] = json_encode($data);


     return view('whatsapps.chart2', compact('record'), $data);
    }

    public function graficoEmail()
    {
    $record = Email::select(\DB::raw("SUM(recebidos) as count1"),\DB::raw("SUM(enviados) as count2"), \DB::raw("date(created_at) as day_name"))
          ->groupBy('day_name')
          ->orderBy('day_name')
          ->get();
          $data = [];
     foreach($record as $row) {
     $data['data'][] = $row->day_name;
     $data['qtd1'][] = (int) $row->count1;
     $data['qtd2'][] = (int) $row->count2;
                              }
     $data['chart_data'] = json_encode($data);


     return view('emails.chart3', compact('record'), $data);
    }

}



