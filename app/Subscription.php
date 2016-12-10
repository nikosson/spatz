<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['user_id', 'subscription_id', 'subscription_type'];

    public function toggleSubscription()
    {
        if($this->exists) {
            $this->delete();
        }
        else {
            $this->save();
        }

        return $this;
    }
}
