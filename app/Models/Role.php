<?php

namespace App\Models;


use Zizaco\Entrust\EntrustRole;


class Role extends EntrustRole
{

	 protected $table = 'roles';

    protected $fillable = ['name', 'display_name', 'description'];

    public function permissions() {

    	return $this->belongsToMany('\App\Models\Permission', 'permission_role');
    }

    public function users() {

        return $this->belongsToMany('\App\Models\User', 'role_user');
    }
}