<?php
namespace App\Traits;

use App\Role;

trait HasRoles
{
	public function roles(){
		return $this->belongsToMany(Role::class,'role_user');
	}

	public function hasRole(... $roles){
		foreach ($roles as $role) {
			if($this->roles->contains('slug', $role)){
				return true;
			}
		}

		return false;
	}
}
