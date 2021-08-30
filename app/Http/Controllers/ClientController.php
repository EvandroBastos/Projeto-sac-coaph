<?php

namespace App\Http\Controllers;
use App\Client;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->regenerate();
        $clients = Client::get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $client = new Client;
            $client->protocolo = date('YmdHis').rand ( 0 , 10000 );
            return view('clients.create', ['client'=>$client]);
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
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'email',
            'setor' => 'required',
            'motivo' => 'required',
            'assunto' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
                                 }
        $client = new Client;
        $client->matricula = $request->input('matricula');
        $client->cpf = $request->input('cpf');
        $client->nome = $request->input('nome');
        $client->telefone = $request->input('telefone');
        $client->email = $request->input('email');
        $client->setor = $request->input('setor');
        $client->motivo = $request->input('motivo');
        $client->assunto = $request->input('assunto');
        $client->observacao = $request->input('observacao');
        $client->protocolo = $request->input('protocolo');
        $client->digitro = $request->input('digitro');
        if ($request->file('documento')){
            $file=$request->file('documento');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->documento->move('storage/', $filename);
            $client->documento=$filename;
        }
        $client->save();
        return redirect()->route('clients.index')->with('toast_success','Protocolo Cadastrado com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
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
        $client = Client::findOrFail($id);
        $client->matricula = $request->input('matricula');
        $client->cpf = $request->input('cpf');
        $client->nome = $request->input('nome');
        $client->telefone = $request->input('telefone');
        $client->email = $request->input('email');
        $client->setor = $request->input('setor');
        $client->motivo = $request->input('motivo');
        $client->assunto = $request->input('assunto');
        $client->observacao = $request->input('observacao');
        $client->protocolo = $request->input('protocolo');
        $client->digitro = $request->input('digitro');
        if ($request->file('documento')){
            $file=$request->file('documento');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->documento->move('storage/', $filename);
            $client->documento=$filename;
        }
        $client->save();
        return redirect()->route('clients.index')->with('toast_success','Protocolo Alterado com Sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $client = Client::findOrFail($id);

        if($client->delete()){
            $request->session()->flash('success','Protocolo deletado com sucesso!');
                   }else{
                    $request->session()->flash('error','Não foi possível deletar o Protocolo!');
                }
    return redirect()->route('clients.index');
}

public function download($file){
    return response()->download('storage/'.$file);
}
}
