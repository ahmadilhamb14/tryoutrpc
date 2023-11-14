<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            // 'users' => User::all(),
            "title" => "Profile"
        ]);
        
    }
    public function edit($id)
    {
        // return view('editprofile', [
        //     // 'users' => User::all(),
        //     "title" => "Edit Profile"
        // ]);

        // $user = Auth::user()->id;

        return view('editprofile', [
            "title" => "Edit Profile",
            'profile' => User::where('id',$id)->first(),
        ]);
        
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'username' => 'required|min:3|max:255|unique:users',    
            'fullname' => 'required|max:255',
            'school' => 'required|max:255'                                                                                                                                                                                                                                                                                                                     
        ];

        $validatedData = $request->validate($rules);
        User::where('id', $user->id)->update($validatedData);
        return redirect('/profile')->with('success', 'Data profile berhasil diupdate!');
    }

}
