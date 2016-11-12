<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['title', 'slug', 'color', 'info', 'url'];

    /**
     * Change default database column for model binding
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
