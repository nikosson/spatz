<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserRequest;

class UserController extends Controller
{
    /**
     * Show all registered user
     * 
     * @param string $showType
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll($showType = 'simple')
    {
        $users = User::paginate(25);
        $view = 'backend.user.showAll' . ucfirst($showType);

        return view($view, compact('users'));
    }

    /**
     * Show form for creating a new user
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createForm()
    {
        return view('backend.user.createNew');
    }


    /**
     * Store a new user with requested parameters
     * 
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]); 
        flash("You've successfully created a new user!", 'success');
        
        return redirect()->action(
            'Backend\UserController@showAll'
        );
    }
    
    
}
