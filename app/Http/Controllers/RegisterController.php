<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // return $request->all();
        // Validasi Data
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',    
            'password' => 'required|min:5|max:255',   
            'fullname' => 'required|max:255',
            'id_school' => 'required'
        ]);


        // Enkripsi password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Memasukkan Data Registrasi ke dalam Database
        // User::create($validatedData);
        User::create($validatedData);

        // // Masuk Ke Halaman Login dan Memberikan pesan berhasil registrasi
        // // request()->session()->flash('success', 'Registrasion succesfull! Please Login');
        return redirect('/login')->with('success', 'Registrasion succesfull! Please Login');
    }
}
