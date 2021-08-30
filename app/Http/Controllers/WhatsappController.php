<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Whatsapp;
use Carbon\Traits\Date;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Validator;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->regenerate();
        $whatsapps = Whatsapp::get();
        return view('whatsapps.index', compact('whatsapps'));
    }
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            return view('whatsapps.create');
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'recebidos' => 'required|numeric',
            'enviados' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $whatsapps = new Whatsapp;
        $whatsapps->recebidos = $request->input('recebidos');
        $whatsapps->enviados = $request->input('enviados');
        $whatsapps->save();
        return redirect()->route('whatsapps.index')->with('toast_success','Registros do Whatsapp Cadastrado!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $whatsapps = Whatsapp::findOrFail($id);
        return view('whatsapps.show', compact('whatsapps'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $whatsapps = Whatsapp::findOrFail($id);
        return view('whatsapps.edit', compact('whatsapps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'recebidos' => 'required|numeric',
            'enviados' => 'required|numeric'
        ]);
        $whatsapps = new Whatsapp;
        $whatsapps->recebidos = $request->input('recebidos');
        $whatsapps->enviados = $request->input('enviados');
        $whatsapps->save();
        return redirect()->route('whatsapps.index')->with('toast_success','Registros do Whatsapp Cadastrado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $whatsapps = Whatsapp::findOrFail($id);

        if($whatsapps->delete()){
            $request->session()->flash('success','Protocolo do Atendimento Presencial deletado com sucesso!');
                   }else{
                    $request->session()->flash('error','Não foi possível deletar o Protocolodo Atendimento Presencial!');
                }
    return redirect()->route('whatsapps.index');
}
}
