<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show general info(name, surname, about info) about current user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showInfo()
    {
        $user = User::findOrFail(auth()->id());
        return view('settings.info', compact('user'));
    }

    /**
     * Update general information about user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'max:25|alpha',
            'lastName' => 'max:25|alpha',
            'about' => 'max:500',
        ]);

        $user = User::findOrFail(auth()->id());
        $user->updatePersonalInfo($request->all());

        flash("You've successfully updated your information!", 'success');

        return redirect()->action('Frontend\SettingsController@showInfo');
    }

    /**
     * Show mailing information for current user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMailing()
    {
        $user = User::findOrFail(auth()->id());
        return view('settings.mailing', compact('user'));
    }

    /**
     * Update mailing information for current user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateMailing(Request $request)
    {
        $user = User::findOrFail(auth()->id());
        $user->updateMailingInfo($request->all());

        flash("You've successfully updated your mailings!", 'success');

        return redirect()->action('Frontend\SettingsController@showMailing');
    }

    /**
     * Show subscriptions for a current user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSubscriptions()
    {
        $user = User::findOrFail(auth()->id());
        $subscriptions = $user->getQuestionSubscriptions;

        return view('settings.subscriptions', compact('subscriptions'));
    }

    public function showAccountInfo()
    {
        $user = User::findOrFail(auth()->id());

        return view('settings.account', compact('user'));
    }

    public function updateAccountInfo(Request $request)
    {
        $user = User::findOrFail(auth()->id());

        $this->validate($request, [
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => [
                'min:6', 'confirmed'
            ],
        ]);

        $user->updateAccountInfo($request->all());

        flash("You've successfully updated your account information!", 'success');

        return redirect()->action('Frontend\SettingsController@showAccountInfo');
    }
}
