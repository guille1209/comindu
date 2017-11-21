<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          if(\Auth::user()->can('read-menus')) {

            $menus = \App\Models\Menu::orderBy('updated_at', 'desc')->get();

            return view('menu.index', compact('menus'));
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
        if(\Auth::user()->can('create-menus')) {
         
            $data = array();
             
            $data['platosFrios'] = \App\Models\Plato::where('grupo_plato_id',1)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');            
            
            $data['desayunos']  = \App\Models\Plato::where('grupo_plato_id',2)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');
            
            $data['almuerzos']   = \App\Models\Plato::where('grupo_plato_id',3)->orWhere('grupo_plato_id',5)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');
            
            $data['cenas']   = \App\Models\Plato::where('grupo_plato_id',4)->orWhere('grupo_plato_id',6)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');
                    

            return view('menu.create',  compact('data' ));
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
       if(\Auth::user()->can('create-menus')) {

            $validacion = array( 'inicio' => 'required|unique:menus,inicio',
                                  'fin' =>'required'    );
            
            for ($i=1; $i <=7; $i++) { 
                $validacion['platoFrio'.$i] = 'required';
                $validacion['desayuno'.$i] = 'required';
                $validacion['almuerzo'.$i] = 'required';
                $validacion['cena'.$i] = 'required';
            }

            $this->validate($request, $validacion);
            $menu = \App\Models\Menu::create($request->all());
               
            
            for ($i=1; $i <=7; $i++) { 
                    foreach ($request->input('platoFrio'.$i) as  $value) {
                     
                        $menu->plato()->attach($value , ['dia'=> $i]);             
                    }
                    foreach ($request->input('desayuno'.$i) as  $value) {
                      
                        $menu->plato()->attach($value , ['dia'=> $i]);      
                    }
                    foreach ($request->input('almuerzo'.$i) as  $value) {
                       
                        $menu->plato()->attach($value , ['dia'=> $i]);      
                    }
                    foreach ($request->input('cena'.$i) as  $value) {
                        
                        $menu->plato()->attach($value , ['dia'=> $i]);      
                    }
             }       
              
            
            \Session::flash('message', trans('ui.menu.message_create', array('name' => $menu->descripcion)));

            return redirect('menu');
        }

        return redirect('auth/logout');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if(\Auth::user()->can('update-menus')) {
            
            $data = array();
             
            $data['platosFrios'] = \App\Models\Plato::where('grupo_plato_id',1)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');            
            
            $data['desayunos']  = \App\Models\Plato::where('grupo_plato_id',2)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');
            
            $data['almuerzos']   = \App\Models\Plato::where('grupo_plato_id',3)->orWhere('grupo_plato_id',5)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');
            
            $data['cenas']   = \App\Models\Plato::where('grupo_plato_id',4)->orWhere('grupo_plato_id',6)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');
          
            $menu = \App\Models\Menu::findOrFail($id);
            for ($i=1; $i <=7; $i++) {           
                $data['platoFrio'.$i]  =  $menu->platoDia($menu->id,$i,array("Platos Frios"));
                $data['desayuno'.$i]  =  $menu->platoDia($menu->id,$i,array('Desayuno'));
                $data['almuerzo'.$i]    =  $menu->platoDia($menu->id,$i,array('Almuerzo','Dieta Almuerzo'));
                $data['cena'.$i]  =  $menu->platoDia($menu->id,$i,array('Cena','Dieta Cena'));
            }    
            

            return view('menu.edit', compact('menu', 'data'));
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
       if(\Auth::user()->can('update-menus')) {

             $validacion = array( 'inicio' => 'required|unique:menus,inicio,'.$id,
                                  'fin' =>'required'    );
            
            for ($i=1; $i <=7; $i++) { 
                $validacion['platoFrio'.$i] = 'required';
                $validacion['desayuno'.$i] = 'required';
                $validacion['almuerzo'.$i] = 'required';
                $validacion['cena'.$i] = 'required';
            }

            $this->validate($request, $validacion);
            $menu = \App\Models\Menu::findOrFail($id);
            $menu->update($request->all());
            $menu->plato()->detach();

            for ($i=1; $i <=7; $i++) { 
                    foreach ($request->input('platoFrio'.$i) as  $value) {
                     
                        $menu->plato()->attach($value , ['dia'=> $i]);             
                    }
                    foreach ($request->input('desayuno'.$i) as  $value) {
                      
                        $menu->plato()->attach($value , ['dia'=> $i]);      
                    }
                    foreach ($request->input('almuerzo'.$i) as  $value) {
                       
                        $menu->plato()->attach($value , ['dia'=> $i]);      
                    }
                    foreach ($request->input('cena'.$i) as  $value) {
                        
                        $menu->plato()->attach($value , ['dia'=> $i]);      
                    }
             }      
              


            \Session::flash('message', trans('ui.menu.message_update', array('name' => $menu->descripcion)));

            return $this->index();
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
       if(\Auth::user()->can('delete-menus')) {

            $menu = \App\Models\Menu::findOrFail($id);

            \App\Models\Menu::destroy($id);

            \Session::flash('message', trans('ui.menu.message_delete', array('name' => $menu->descripcion)));

             return redirect('menu');
        }

        return redirect('auth/logout');
    }

     public function copy($id)
    {
        if(\Auth::user()->can('create-menus')) {
         
            $data = array();
             
            $data['platosFrios'] = \App\Models\Plato::where('grupo_plato_id',1)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');            
            
            $data['desayunos']  = \App\Models\Plato::where('grupo_plato_id',2)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');
            
            $data['almuerzos']   = \App\Models\Plato::where('grupo_plato_id',3)->orWhere('grupo_plato_id',5)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');
            
            $data['cenas']   = \App\Models\Plato::where('grupo_plato_id',4)->orWhere('grupo_plato_id',6)->orderBy('descripcion', 'asc')->lists('descripcion', 'id');
                    
            $menu = \App\Models\Menu::findOrFail($id);
            for ($i=1; $i <=7; $i++) {           
                $data['platoFrio'.$i]  =  $menu->platoDia($menu->id,$i,array("Platos Frios"));
                $data['desayuno'.$i]  =  $menu->platoDia($menu->id,$i,array('Desayuno'));
                $data['almuerzo'.$i]    =  $menu->platoDia($menu->id,$i,array('Almuerzo','Dieta Almuerzo'));
                $data['cena'.$i]  =  $menu->platoDia($menu->id,$i,array('Cena','Dieta Cena'));
            }   

            return view('menu.create',  compact('data' ));
        }

        return redirect('auth/logout');
    }

    public function pdf($id) {

        $data = \App\Models\Menu::findOrFail($id);
         for ($i=1; $i <=7; $i++) {           
                $data['platoFrio'.$i]  =  $data->platoDia($data->id,$i,array("Platos Frios"),"descripcion");
                $data['desayuno'.$i]  =  $data->platoDia($data->id,$i,array('Desayuno'),"descripcion");
                $data['almuerzo'.$i]    =  $data->platoDia($data->id,$i,array('Almuerzo','Dieta Almuerzo'),"descripcion");
                $data['cena'.$i]  =  $data->platoDia($data->id,$i,array('Cena','Dieta Cena'),"descripcion");
            }   


        

        $pdf = \PDF::loadView('menu.pdf', array('data' => $data))
                ->setOrientation('landscape');
        return $pdf->stream();
    }

   /* private function generateRandomString($length) {
        $pattern = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        return substr(str_shuffle($pattern), 0, $length);
    }

    private function generateRandomNumber($length) {
        $pattern = "0123456789";
        return substr(str_shuffle($pattern), 0, $length);
    }

    private function generateCode($lengthString, $lengthNumber) {
        return $this->generateRandomString($lengthString).$this->generateRandomNumber($lengthNumber);
    }*/

}
