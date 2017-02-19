<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showAll($showType = 'simple')
    {
        $users = User::paginate(25);
        $view = 'backend.user.showAll' . ucfirst($showType);

        return view($view, compact('users'));
    }
    
}
