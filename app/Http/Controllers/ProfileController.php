<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kabupaten;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                "kabupatens" => Kabupaten::all(),
                "sekolahs" => Sekolah::all()
            ]);

        } else {
            abort(403); // Atau arahkan pengguna ke halaman larangan akses
        }

        
    }

    public function update(Request $request, User $user)
    {
        // dd($request);
        

        if ($request->password) {
            $rules = $request->validate([  
                'username' => 'min:3|max:255|unique:users,username,' . $user->id,
                'fullname' => 'max:255',
                'id_school' => 'max:255',
                'password' => 'required|min:5|max:255'                                                                                                                                                                                                                                                                                                                   
            ]);
            $rules['password'] = Hash::make($rules['password']);
        } else {
            $rules = $request->validate([  
                'username' => 'min:3|max:255|unique:users,username,' . $user->id,
                'fullname' => 'max:255',
                'id_school' => 'max:255'                                                                                                                                                                                                                                                                                                                     
            ]);
        }
        // $validatedData = $request->validate($rules);
        
        // dd($validatedData);

        User::where('id', $user->id)->update($rules);
        return redirect('/profile')->with('success', 'Data profile berhasil diupdate!');
    }

}
