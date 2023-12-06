<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tryout;
use App\Models\SubTest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tryout $tryout)
    {
        return view('soaltryout', [
            // 'questions' => Question::all(),
            "questions" => Question::whereHas('subtest', function ($query) use ($tryout) {
                $query->where('id_tryout', $tryout->id);
            })->get(),
            "title" => "Soal Tryout"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tryout)
    {
        return view('tambahsoal', [
            "title" => "Tambah Soal",
            "subtests" => SubTest::where('id_tryout', $tryout)->get(),
            "tryouts" => Tryout::where('id', $tryout)->get()
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {

    $id = $request->id_tryout;
        
    $cleanedData = [
        'question' => $request->question,
        'id_subtest' => $request->subtest_id,
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'option_d' => $request->option_d,
        'option_e' => $request->option_e,
        'option_key' => $request->option_key,
    ];
        // $validatedData = $request->validate([            
        //     'question' => 'required', 
        //     'id_subtest' => 'required',   
        //     'option_a' => 'required',   
        //     'option_b' => 'required',
        //     'option_c' => 'required',
        //     'option_d' => 'required',
        //     'option_e' => 'required',
        //     'option_key' => 'required'
        // ]);

        // dd($cleanedData);
        
        Question::create($cleanedData);

        // return back()->with('success', 'Berhasil Menambahkan Soal');
        return redirect("/tryout/{$id}")->with('success', 'Berhasil Menambahkan Soal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($tryout, $question)
    {
        return view('lihatsoal', [
            "title" => "Soal Tryout",
            "subtests" => SubTest::all(),
            "tryouts" => Tryout::where('id', $tryout)->get(),
            // "questions" => Question::where('subtest.id_tryout', $tryout->id)->get(),
            "questions" => Question::where('id', $question)->first()
        ]);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($tryout, $question)
    {
        return view('editsoal', [
            'title' => "Edit Soal",
            "subtests" => SubTest::where('id_tryout', $tryout)->get(),
            // "questions" => Question::whereHas('subtest', function ($query) use ($tryout) {
            //     $query->where('id_tryout', $tryout);
            // })->get()
            "tryouts" => Tryout::where('id', $tryout)->get(),
            "questions" => Question::where('id', $question)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        dd($request->subtest_id);
        $id = $request->id_tryout;
        $rules = [
            'question' => $request->question,
            'id_subtest' => $request->subtest_id,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'option_e' => $request->option_e,
            'option_key' => $request->option_key,
        ];

        $validatedData = $request->validate($rules);
        Question::where('id', $question->id)->update($validatedData);
        return redirect("/tryout/{$id}")->with('success', 'Data Soal Tryout berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($tryout, $question)
    {
        Question::destroy($question);

        return back()->with('success', 'Berhasil Menghapus Soal!');

        // return redirect('/tryout/{{ $tryout->id }}')->with('success', 'Berhasil Menghapus Soal!');
    }
}
