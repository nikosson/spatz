<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\User;
use Illuminate\Http\Request;

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
     * @param SettingsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateInfo(SettingsRequest $request)
    {
        $user = User::findOrFail(auth()->id());
        $user->updateSettingsInfo($request);

        flash("You've successfully updated your information!", 'success');

        return redirect()->action('SettingsController@showInfo');
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
        $user->updateSettingsMailing($request);

        flash("You've successfully updated your mailings!", 'success');

        return redirect()->action('SettingsController@showMailing');
    }
}
