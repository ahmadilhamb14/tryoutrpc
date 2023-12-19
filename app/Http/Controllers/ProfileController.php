<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::id() == $id) {
            return view('editprofile', [
                "title" => "Edit Profile",
                'profile' => User::where('id',$id)->first(),
            ]);

        } else {
            abort(403); // Atau arahkan pengguna ke halaman larangan akses
        }

        
    }

    public function update(Request $request, User $user)
    {
        // dd($request);
        

        if ($request->password) {
            $rules = [  
                'username' => 'min:3|max:255|unique:users,username,' . $user->id,
                'fullname' => 'max:255',
                'school' => 'max:255',
                'password' => 'required|min:5|max:255'                                                                                                                                                                                                                                                                                                                   
            ];
        } else {
            $rules = [  
                'username' => 'min:3|max:255|unique:users,username,' . $user->id,
                'fullname' => 'max:255',
                'school' => 'max:255'                                                                                                                                                                                                                                                                                                                     
            ];
        }

        $validatedData = $request->validate($rules);
        // dd($validatedData);

        User::where('id', $user->id)->update($validatedData);
        return redirect('/profile')->with('success', 'Data profile berhasil diupdate!');
    }

}
