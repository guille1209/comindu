<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(\Auth::user()->can('read-platos')) {

            $platos = \App\Models\Plato::orderBy('updated_at', 'desc')->get();

            return view('plato.index', compact('platos'));
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
        if(\Auth::user()->can('create-platos')) {

           $grupo_plato = \App\Models\GrupoPlato::orderBy('name', 'asc')->lists('name', 'id');

            return view('plato.create',  compact('grupo_plato'));
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
        if(\Auth::user()->can('create-platos')) {

            $this->validate($request, [
                'descripcion' => 'required|min:3|unique:platos,descripcion',                
                'grupo_plato_id' =>'required'
            ]);

            $data = \App\Models\Plato::create($request->all());

            $plato = \App\Models\Plato::findOrFail($data->id);
            
            \Session::flash('message', trans('ui.plato.message_create', array('descripcion' => $plato->descripcion)));

            return redirect('plato/create');
        }

        return redirect('auth/logout');
    }

   public function show()
    {
        if(\Auth::user()->can('print-platos')) {
            $data=array();
            $a = \App\Models\GrupoPlato::all();            
            foreach ($a as $row) {
                
                $platos =  array_column($row->plato->toArray(), 'descripcion');
                sort($platos); 
                array_push($data , array($row->name, $platos ));
            }         
        
            $pdf = \PDF::loadView('plato.pdf', compact('data'));
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
        if(\Auth::user()->can('update-platos')) {

            $plato = \App\Models\Plato::findOrFail($id);

            $grupo_plato = \App\Models\GrupoPlato::orderBy('name', 'asc')->lists('name', 'id')->toArray();

            asort($grupo_plato);

            return view('plato.edit', compact('plato', 'grupo_plato'));
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
         if(\Auth::user()->can('update-platos')) {

             $this->validate($request, [
                'descripcion' => 'required|min:3|unique:platos,descripcion,'.$id,                
                'grupo_plato_id' =>'required'
            ]);

            $plato = \App\Models\Plato::findOrFail($id);

            $plato->update($request->all());

          
            \Session::flash('message', trans('ui.plato.message_update', array('descripcion' => $plato->descripcion)));

            return redirect('plato');
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
        if(\Auth::user()->can('delete-platos')) {

            $plato = \App\Models\Plato::findOrFail($id);

            \App\Models\Plato::destroy($id);

            \Session::flash('message', trans('ui.plato.message_delete', array('descripcion' => $plato->descripcion)));

            return redirect('plato');
        }

        return redirect('auth/logout');
    }

    
    public function recetaIndex()
    {
        
        if(\Auth::user()->can('read-recetas')) {

            $platos = \App\Models\Plato::all();

            return view('receta.index', compact('platos'));
        }

        return redirect('auth/logout');
    }

    public function recetaList($id)
    {
        if(\Auth::user()->can('create-recetas')) {
 
           $plato = \App\Models\Plato::findOrFail($id);

          return view('receta.list',  compact('plato'));
        }

        return redirect('auth/logout');
    }

    public function recetaCreate($id)
    {
        if(\Auth::user()->can('create-recetas')) {

           $unidades = \App\Models\Unidad::orderBy('desc_corta', 'asc')->lists('desc_corta', 'id');

           $alimentos = \App\Models\Alimento::orderBy('name', 'asc')->lists('name', 'id');

           $plato = \App\Models\Plato::findOrFail($id);

           return view('receta.create',  compact('unidades','alimentos', 'plato'));
        }

        return redirect('auth/logout');
    }

    public function recetaStore(Request $request)
    {
        if(\Auth::user()->can('create-recetas')) {

            $this->validate($request, [
                'cantidad' => 'required|numeric',                
                'unidad_id' =>'required',
                'alimento_id' =>'required|unique:recetas,alimento_id,null,null,plato_id,'.$request->id
            ]);

            
            $plato = \App\Models\Plato::findOrFail($request->id);

            $plato->receta()->attach([$plato->id => ['cantidad' => $request->cantidad, 
                                                     'unidad_id' => $request->unidad_id,
                                                     'alimento_id' => $request->alimento_id,
                                                     'descripcion' => $request->descripcion
                                                             ]]);

            $ingrediente =   \App\Models\Alimento::findOrFail($request->alimento_id);   
            \Session::flash('message', trans('ui.receta.message_create', array('name' => $ingrediente->name)));

            return redirect('receta/'.$plato->id.'/list');
        }

        return redirect('auth/logout');
    }

    public function recetaEdit($plato_id, $alimento_id)
    {
        if(\Auth::user()->can('update-recetas')) {

            $plato = \App\Models\Plato::findOrFail($plato_id);

            $ingrediente = \App\Models\Plato::findOrFail($plato_id)->receta()->where('recetas.alimento_id',$alimento_id)->first();                  
           
   
            $alimentos = \App\Models\Alimento::where('id',$alimento_id)->orderBy('name', 'asc')->lists('name', 'id');
            $unidades = \App\Models\Unidad::orderBy('desc_corta', 'asc')->lists('desc_corta', 'id');
           

            return view('receta.edit', compact('plato', 'alimentos', 'unidades', 'ingrediente'));
        }

        return redirect('auth/logout');
    }

    public function recetaUpdate(Request $request)
    {
         if(\Auth::user()->can('update-recetas')) {

               $this->validate($request, [
                'cantidad' => 'required|numeric',                
                'unidad_id' =>'required',
                'alimento_id' =>'required'
            ]);


            $plato = \App\Models\Plato::findOrFail($request->id);

            $plato->receta()->updateExistingPivot($request->alimento_id , ['cantidad' => $request->cantidad, 
                                                     'unidad_id' => $request->unidad_id,
                                                     'descripcion' => $request->descripcion
                                                             ]);
             $ingrediente =   \App\Models\Alimento::findOrFail($request->alimento_id);   
          
            \Session::flash('message', trans('ui.receta.message_update', array('name' => $ingrediente->name)));

            return redirect('receta/'.$plato->id.'/list');
        }

             return redirect('auth/logout');
    }
    
    public function recetaDestroy($plato_id)
    {
        if(\Auth::user()->can('delete-recetas')) {

            $plato = \App\Models\Plato::findOrFail($plato_id);

            $plato->receta()->detach();
           
            \Session::flash('message', trans('ui.receta.message_delete_all'));

            $platos = \App\Models\Plato::all();
            return view('receta.index',  compact('platos'));
        }

        return redirect('auth/logout');
    }


    public function ingredienteDestroy($plato_id, $alimento_id)
    {
        if(\Auth::user()->can('delete-recetas')) {

            $plato = \App\Models\Plato::findOrFail($plato_id);

            $plato->receta()->detach([$alimento_id]);

            $ingrediente =   \App\Models\Alimento::findOrFail($alimento_id);   
           
            \Session::flash('message', trans('ui.receta.message_delete', array('name' => $ingrediente->name)));

           return redirect('receta/'.$plato->id.'/list');
        }

        return redirect('auth/logout');
    }


}
