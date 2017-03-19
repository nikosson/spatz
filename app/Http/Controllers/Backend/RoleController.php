<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Access\Role;
use App\Models\Access\Permission;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Show all roles
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll()
    {
        $roles = Role::all();

        return view('backend.role.showAll', compact('roles'));
    }

    /**
     * Show form for creating a new role
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createForm()
    {
        $permissions = Permission::all();
        $users = User::all();
        return view('backend.role.createNew', compact('permissions', 'users'));
    }

    /**
     * Store a role with given request
     *
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create([
            'name'  => $request->name,
            'label' => $request->label
        ]);

        $role->appointUsers($request->usersIds);
        $role->attachPermissions($request->permissions);
        flash("You've successfully created a new role!", 'success');

        return redirect()->action(
            'Backend\RoleController@showAll'
        );
    }

    /**
     * Show form for editing a role
     *
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $users = User::all();
        return view('backend.role.edit', compact('role', 'permissions', 'users'));
    }


    /**
     * Update a role with given request
     *
     * @param Role $role
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Role $role, RoleRequest $request)
    {
        $role->update([
            'name'  => $request->name,
            'label' => $request->label
        ]);

        $role->attachPermissions($request->permissions);
        $role->appointUsers($request->usersIds);

        flash("You've successfully updated a role!", 'success');

        return redirect()->action(
            'Backend\RoleController@showAll'
        );
    }

    /**
     * Delete a given role
     *
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();
        flash("You've successfully deleted a role!", 'success');

        return redirect()->action(
            'Backend\RoleController@showAll'
        );
    }
}
