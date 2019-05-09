<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index')->with('users', User::paginate(10));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // dd($user->id);
        //  dd($this->checkIfUser($user->id));
        if ($this->checkIfUser($user->id)) {
            return back()->with('warning', 'Sorry. You cannot perform this action');
        }
        return view('admin.edit')->with(
            [
                 'user' => $user,
                'roles' => Role::all(),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // sync the edited roles
        $user->roles()->sync($request->roles);

        // return to index
        return redirect()->route('admin.users.index')->with('success', "You successfully edited {$user->name} roles");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($this->checkIfUser($user->id)) {
            return back()->with('warning', 'Sorry. You cant perform the requested action');
        }
        // if u didnt set foreign keys
        // and cascade on delete
        // in the role_user table
        // then detach the roles
        // before deleting user
        //  $user->roles()->detach();

        // delete user
        $user->delete();

        return back()->with('success', 'User deleted successfully');
    }

    /**
     * Check if id passed belongs to a user
     *
     * @return bool
     */
    private function checkIfUser($id)
    {
        return (Auth::id() == $id) ? true : false;
    }
}
