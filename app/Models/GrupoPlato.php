<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoPlato extends Model
{
    protected $table = 'grupo_platos';

    protected $fillable = ['name'];

    public function plato() {

        return $this->hasMany('\App\Models\Plato');
    }
}
