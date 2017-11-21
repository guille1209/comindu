<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [ 'id','inicio', 'fin', 'descripcion'];

   

    public function plato() {

        return $this->belongsToMany('\App\Models\Plato')->withPivot('dia'); 
    }     

    public function platoDia($id, $dia, $grupoPlato, $campo = "plato_id") {
       
     return \DB::table('menu_plato')
            ->join('platos', 'platos.id', '=', 'menu_plato.plato_id')
            ->join('grupo_platos', 'grupo_platos.id', '=', 'platos.grupo_plato_id')
            ->select('menu_plato.plato_id', 'platos.descripcion'  )
            ->where("menu_plato.menu_id", $id)
            ->where("menu_plato.dia", $dia)
            ->whereIn("grupo_platos.name", $grupoPlato)
            ->orderBy("descripcion",'asc')
            ->lists($campo);
    }
}
