<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = 'platos';

    protected $fillable = ['descripcion', 'grupo_plato_id'];

    public function grupo_plato() {

    	return $this->belongsTo('App\Models\GrupoPlato');
    }

    public function receta() {

        return $this->belongsToMany('App\Models\Alimento', 'recetas','plato_id','alimento_id')
        ->withPivot('cantidad','unidad_id','descripcion'); 
    }             

    public function unidad($unidad) {
        $unidad =  \App\Models\Unidad::findOrFail($unidad);  
    	return $unidad->desc_corta;
    }

    
}
