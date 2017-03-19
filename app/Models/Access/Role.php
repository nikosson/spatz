<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    protected $fillable = ['name', 'label'];

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
     * Role belongsToMany users relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }       

    /**
     * Give specified permission to a role
     * 
     * @param Permission $permission
     * @return Model
     */
    public function givePermissionsTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    /**
     * Remove a given permission from current role
     *
     * @param Permission $permission
     * @return int
     */
    public function removePermissionTo(Permission $permission)
    {
        return $this->permissions()->detach($permission->id);
    }


    /**
     * Attach permissions to a given role
     *
     * @param $permissionsIds
     * @return bool
     */
    public function attachPermissions($permissionsIds)
    {
        return $this->permissions()->sync($permissionsIds);
    }


    /**
     * Appoint role to a given list of users
     * 
     * @param $usersIds
     * @return $this|Model
     */
    public function appointUsers($usersIds)
    {
        return $this->users()->sync($usersIds);
    }

}
