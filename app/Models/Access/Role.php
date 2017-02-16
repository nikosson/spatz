<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * Role belongsToMany permissions relationship
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Give specified permission to a role
     * 
     * @param Permission $permission
     * @return Model
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
