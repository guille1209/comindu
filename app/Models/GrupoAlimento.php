<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoAlimento extends Model
{
    protected $table = 'grupo_alimentos';

    protected $fillable = ['name'];
   
    public function alimento() {

        return $this->hasMany('\App\Models\Alimento');
    }
}
