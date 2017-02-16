<?php

namespace App\Models\Access;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * Permission belongsToMany Roles relationship
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
}
