<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Validator;
use App\Client;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Facade\FlareClient\Http\Response;
use App\Http\Requests\ClientRequest;

class ProtocoloController extends Controller
{
    public function store(Request $request, $id)
    {
            $request->session()->push('todotasks',$id);
            return redirect()->route('clients.index');
    }
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = session('todotasks');
        $ids = array_where($ids, function($value, $key) use ($id){
            return $value != $id;
        });
        session(['todotasks'=>$id]);
        return redirect()->route('clients.index');
    }
}
