<?php

namespace App\Http\Controllers;
use App\Presencial;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class PresencialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->regenerate();
        $presencials = Presencial::get();
        return view('presencials.index', compact('presencials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presencial = new Presencial;
        $presencial->protocolo = date('YmdHis').rand ( 0 , 10000 );
        return view('presencials.create', ['presencial'=>$presencial]);
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
        $presencial = new Presencial;
        $presencial->matricula = $request->input('matricula');
        $presencial->cpf = $request->input('cpf');
        $presencial->nome = $request->input('nome');
        $presencial->telefone = $request->input('telefone');
        $presencial->email = $request->input('email');
        $presencial->setor = $request->input('setor');
        $presencial->motivo = $request->input('motivo');
        $presencial->assunto = $request->input('assunto');
        $presencial->observacao = $request->input('observacao');
        $presencial->protocolo = $request->input('protocolo');
        $presencial->digitro = $request->input('digitro');
        if ($request->file('documento')){
            $file=$request->file('documento');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->documento->move('storage/', $filename);
            $presencial->documento=$filename;
        }
        $presencial->save();
        return redirect()->route('presencials.index')->with('toast_success','Protocolo Cadastrado com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presencial = Presencial::findOrFail($id);
        return view('presencials.show', compact('presencial'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $presencial = Presencial::findOrFail($id);
        return view('presencials.edit', compact('presencial'));
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
        $presencial = Presencial::findOrFail($id);
        $presencial->matricula = $request->input('matricula');
        $presencial->cpf = $request->input('cpf');
        $presencial->nome = $request->input('nome');
        $presencial->telefone = $request->input('telefone');
        $presencial->email = $request->input('email');
        $presencial->setor = $request->input('setor');
        $presencial->motivo = $request->input('motivo');
        $presencial->assunto = $request->input('assunto');
        $presencial->observacao = $request->input('observacao');
        $presencial->protocolo = $request->input('protocolo');
        $presencial->digitro = $request->input('digitro');
        if ($request->file('documento')){
            $file=$request->file('documento');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->documento->move('storage/', $filename);
            $presencial->documento=$filename;
        }
        $presencial->save();
        return redirect()->route('presencials.index')->with('toast_success','Protocolo Alterado com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $presencial = Presencial::findOrFail($id);

        if($presencial->delete()){
            $request->session()->flash('success','Protocolo deletado com sucesso!');
                   }else{
                    $request->session()->flash('error','Não foi possível deletar o Protocolo!');
                }
    return redirect()->route('presencials.index');
}

public function download($file){
    return response()->download('storage/'.$file);
}
}
