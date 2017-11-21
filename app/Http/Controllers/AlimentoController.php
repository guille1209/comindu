<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('read-alimentos')) {

            $alimentos = \App\Models\Alimento::all();

            return view('alimento.index', compact('alimentos'));
        }

        return redirect('auth/logout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          if(\Auth::user()->can('create-alimentos')) {

           $grupo_alimentos = \App\Models\GrupoAlimento::orderBy('name', 'asc')->lists('name', 'id');
           //asort($grupo_alimentos);

           $unidades = \App\Models\Unidad::orderBy('desc_corta', 'asc')->lists('desc_corta', 'id');
           //asort($unidades);
           
           return view('alimento.create',  compact('grupo_alimentos', 'unidades'));
        }

        return redirect('auth/logout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Auth::user()->can('create-alimentos')) {

            $this->validate($request, [
                'name' => 'required|min:3|unique:alimentos,name',                
                'grupo_alimento_id' =>'required',
                'unidad_id' =>'required'
            ]);

            $data = \App\Models\Alimento::create($request->all());

            $alimento = \App\Models\Alimento::findOrFail($data->id);
            
            \Session::flash('message', trans('ui.alimento.message_create', array('name' => $alimento->name)));

            return redirect('alimento/create');
        }

        return redirect('auth/logout');
    }

    public function show()
    {
        if(\Auth::user()->can('print-alimentos')) {

            $data = \App\Models\GrupoAlimento::all();            
          
       
            $pdf = \PDF::loadView('alimento.pdf', array('data' => $data));
            return $pdf->stream();
        }

        return redirect('auth/logout');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if(\Auth::user()->can('update-alimentos')) {

            $alimento = \App\Models\Alimento::findOrFail($id);

            $grupo_alimentos = \App\Models\GrupoAlimento::orderBy('name', 'asc')->lists('name', 'id');

            $unidades = \App\Models\Unidad::orderBy('desc_corta', 'asc')->lists('desc_corta', 'id');

            return view('alimento.edit', compact('alimento', 'grupo_alimentos', 'unidades'));
        }

        return redirect('auth/logout');
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
           if(\Auth::user()->can('update-alimentos')) {

             $this->validate($request, [
                'name' => 'required|min:3|unique:alimentos,name,'.$id,                
                'grupo_alimento_id' =>'required',
                'unidad_id' =>'required'
            ]);

            $alimento = \App\Models\Alimento::findOrFail($id);

            $alimento->update($request->all());

          
            \Session::flash('message', trans('ui.alimento.message_update', array('name' => $alimento->name)));

            return redirect('alimento');
        }

             return redirect('auth/logout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(\Auth::user()->can('delete-alimentos')) {

            $alimento = \App\Models\Alimento::findOrFail($id);

            \App\Models\Alimento::destroy($id);

            \Session::flash('message', trans('ui.alimento.message_delete', array('name' => $alimento->name)));

            return redirect('alimento');
        }

        return redirect('auth/logout');
    }
}
