<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return mixed
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback()
    {
        $user = $this->findOrCreateFacebookUser(
            Socialite::driver('facebook')->user()
        );

        auth()->login($user);

        return redirect('/');
    }

    /**
     * Try to find a user with 'facebook_id' either create a new one
     *
     * @param $facebookUser
     * @return mixed
     */
    public function findOrCreateFacebookUser($facebookUser)
    {
        return User::firstOrCreate([
            'facebook_id' => $facebookUser->id
        ], [
            'name' => str_replace(' ', '-', $facebookUser->name),
            'email' => $facebookUser->email,
            'password' => bcrypt(str_random(8))
        ]);

    }
}
