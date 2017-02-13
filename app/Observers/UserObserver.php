<?php

namespace App\Observers;

use App\Models\Mailing;
use App\Models\User;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        Mailing::create(['user_id' => $user->id]);
    }
}
