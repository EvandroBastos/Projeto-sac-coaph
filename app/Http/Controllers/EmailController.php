<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
use Carbon\Traits\Date;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->regenerate();
        $emails = Email::get();
        return view('emails.index', compact('emails'));
    }
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            return view('emails.create');
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
        $emails = new Email;
        $emails->recebidos = $request->input('recebidos');
        $emails->enviados = $request->input('enviados');
        $emails->save();
        return redirect()->route('emails.index')->with('toast_success','Registros do Email Cadastrado!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emails = Email::findOrFail($id);
        return view('emails.show', compact('emails'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emails = Email::findOrFail($id);
        return view('emails.edit', compact('emails'));
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
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $emails = new Email;
        $emails->recebidos = $request->input('recebidos');
        $emails->enviados = $request->input('enviados');
        $emails->save();
        return redirect()->route('emails.index')->with('toast_success','Registros do Email Alterado!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $emails = Email::findOrFail($id);

        if($emails->delete()){
            $request->session()->flash('success','Protocolo do Atendimento Presencial deletado com sucesso!');
                   }else{
                    $request->session()->flash('error','Não foi possível deletar o Protocolodo Atendimento Presencial!');
                }
    return redirect()->route('emails.index');
}
}
