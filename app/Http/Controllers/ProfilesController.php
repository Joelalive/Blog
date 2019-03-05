<?php

namespace App\Http\Controllers;

use App\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('admin.users.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profile $profile)
    {
        $this->validate($request, [
            'name' =>  'required|min:3',
            'email' =>  'required|email',
            'facebook' =>  'required|url',
            'youtube' =>  'required|url',
            'about' =>  'required',
        ]);

        $user = Auth::user();

        if($request->hasFile('avatar')){
            
            $avatar = $request->avatar;

            $avatar_new_name = time().$avatar->getClientOriginalName(); 

            $avatar->move('uploads/avatars', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatars/'.$avatar_new_name; 

            $user->profile->save();

        }

        $user->name = $request->name;

        $user->email = $request->email;

        $user->profile->facebook = $request->facebook;

        $user->profile->youtube = $request->youtube;

        $user->profile->about = $request->about;

        $user->save();

        $user->profile->save();

        if($request->has('password')){
            
            $user->password = bcrypt($request->password);

            $user->save();
        }

        session()->flash('success', 'Your Profile is Updated.');

        Return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(profile $profile)
    {
        //
    }
}
