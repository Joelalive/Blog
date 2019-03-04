<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Profile;
use App\Http\Middleware\Admin;

class UsersController extends Controller
{
    

    public function __construct(){

        $this->middleware('admin');

    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/default.jpg'
        ]);

        session()->flash('success','User added successfully!');

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->profile->delete();

        $user->delete();

        session()->flash('success', 'User has been deleted.');

        return back();
    }

    public function admin(User $user){

        $attributes['admin'] = $user->admin = 1;

        $user->update($attributes);

        session()->flash('success', 'Successfully changed user permission');

        return back();
    }

    public function not_admin(User $user){

        $attributes['admin'] = $user->admin = 0;

        $user->update($attributes);

        session()->flash('success', 'Successfully changed user permission');

        return back();
    }

}
