<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\SubTest;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTryoutRequest;
use App\Http\Requests\UpdateTryoutRequest;

class TryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tryout', [
            "title" => "Kelola Tryout",
            "tryouts" => Tryout::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahsoal', [
            "title" => "Tambah Soal",
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTryoutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([            
            'question' => 'required', 
            'id_subtest' => 'required',   
            'option_a' => 'required',   
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'option_key' => 'required'
        ]);

        dd($request->validate);


        // Enkripsi password
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // return redirect('/users')->with('success', 'Berhasil Menambahkan User');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function show(Tryout $tryout)
    {
      
        return view('kelola', [
            "title" => "Kelola Tryout",
            "tryouts" => Tryout::find($tryout),
            // "tryouts" => Tryout::where('id', $tryout)->first(),
            // "subtests" => SubTest::where('id_tryout', $tryout)->get(),
            "subtests" => SubTest::where('id_tryout', $tryout->id)->get(),
            // "questions" => Question::where('subtest.id_tryout', $tryout->id)->get(),
            "questions" => Question::whereHas('subtest', function ($query) use ($tryout) {
                $query->where('id_tryout', $tryout->id);
            })->get()
            // "questions" => Question::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function edit(Tryout $tryout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTryoutRequest  $request
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTryoutRequest $request, Tryout $tryout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tryout $tryout)
    {
        //
    }
}
