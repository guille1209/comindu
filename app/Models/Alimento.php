<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $table = 'alimentos';

    protected $fillable = ['name', 'grupo_alimento_id', 'unidad_id'];

    public function grupo_alimento() {

    	return $this->belongsTo('App\Models\GrupoAlimento');
    }

    public function unidad() {

        return $this->belongsTo('App\Models\Unidad');
    }
}
