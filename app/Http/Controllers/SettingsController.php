<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use App\User;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function info()
    {
        $user = User::findOrFail(auth()->id());
        return view('settings.info', compact('user'));
    }

    public function updateInfo(SettingsRequest $request)
    {
        $user = User::findOrFail(auth()->id());
        $user->updateSettingsInfo($request);

        flash("You've successfully updated your information!", 'success');

        return redirect()->action('SettingsController@info');
    }

    public function mailing()
    {
        return view('settings.mailing');
    }

    public function updateMailing()
    {
        $user = User::findOrFail(auth()->id());
        return view('settings.mailing', compact('user'));
    }
}
