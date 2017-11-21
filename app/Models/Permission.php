<?php

namespace App\models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
	protected $table = 'permissions';

    protected $fillable = ['name', 'display_name', 'description'];

    public function roles() {

    	return $this->belongsToMany('App\Models\Role', 'permission_role');
    }
}