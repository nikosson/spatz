<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

    public function mailing()
    {
        $user = User::findOrFail(auth()->id());
        return view('settings.mailing', compact('user'));
    }
}
