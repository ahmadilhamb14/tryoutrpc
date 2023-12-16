<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tryout;
use App\Models\SubTest;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Request;

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

        $validatedData = request()->validate([            
            'question' => 'required', 
            'id_subtest' => 'required',   
            'option_a' => 'required',   
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'option_e' => 'required',
            'option_key' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if ($request->file('image')) {
            $uploadedFile = $request->file('image');
            $path = $uploadedFile->store('post-images', 'public');
        
            // Dapatkan nama file dari path
            $fileName = basename($path);
        
            // Simpan nama file ke dalam database
            $validatedData['image'] = $fileName;
        }
        
        Question::create($validatedData);

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
    public function update(UpdateQuestionRequest $request)
    {
        $id = $request->id_tryout;
        $id1 = $request->id_question;
        $rules = [
            'question' => $request->question,
            'id_subtest' => $request->id_subtest,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'option_e' => $request->option_e,
            'option_key' => $request->option_key,
        ];

        if ($request->hasFile('new_image')) {
            Storage::delete('post-images/' . $request->image);
            $request->image = $request->file('new_image')->store('post-images', 'public');
            $rules['image'] = $request->new_image;
        }

        if ($request->file('new_image')) {
            $uploadedFile = $request->file('new_image');
            $path = $uploadedFile->store('post-images', 'public');
        
            // Dapatkan nama file dari path
            $fileName = basename($path);
        
            // Simpan nama file ke dalam database
            $rules['image'] = $fileName;
        }
        if ($request->file('image')) {
            $uploadedFile = $request->file('image');
            $path = $uploadedFile->store('post-images', 'public');
        
            // Dapatkan nama file dari path
            $fileName = basename($path);
        
            // Simpan nama file ke dalam database
            $rules['image'] = $fileName;
        }
    
        // Lakukan validasi atau operasi lainnya jika diperlukan
    

        Question::where('id', $id1)->update($rules);
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

    public function test(Tryout $tryout, Request $request)
    {
        // dd($request);
        // return view('soaltryout', [
            $subtestNumber = $request->input('subtest', 1);

            // Ambil subtes berdasarkan ID Tryout dan nomor subtes
            $subtest = Subtest::where('id_tryout', $tryout->id)
                              ->where('id', $subtestNumber)
                              ->first();
        
            // Periksa apakah subtes ditemukan
            if (!$subtest) {
                // Handle kasus ketika subtes tidak ditemukan
                // Misalnya, tampilkan pesan kesalahan atau redirect ke halaman lain
                return redirect()->route('route_name_for_error')->with('error', 'Subtest not found for this tryout.');
            }
    // $subtest = $subtests[$subtestNumber - 1]; // -1 karena indeks array dimulai dari 0
    $title = "Soal Tryout";

    // Ambil pertanyaan untuk subtes tertentu
    // $questions = $subtest->questions;
    $questions = $subtest->question;
    // $questions = Question::where('id_subtest', $subtest['id'])->get();

    return view('soaltryout', compact('questions', 'subtest', 'title', 'tryout'));
    }

    public function jawab(Tryout $tryout, Request $request) {
      
        $id_subtest = $request->id_subtes;

        $idArray = $request->input('id');
        $pilihanArray = $request->input('pilihan');
        $score = 0;
        $hasil = 0;

        foreach ($idArray as $id) {
            $question = Question::where('id', $id)
                              ->where('id_subtest', $id_subtest)
                              ->first();
    
            // Check if the question exists
            if ($question) {
                $answer = $question->option_key;
    
                // Check if the key exists in the pilihan array
                if (isset($pilihanArray[$id])) {
                    $submittedAnswer = $pilihanArray[$id];
    
                    // Use loose comparison if types may differ
                    if ($submittedAnswer == $answer) {
                        $score += 1;
                        $hasil = $score * 10;
                    }
                }
            }
        }

        $userId = Auth::id();

        $rules = [
            'id_user' => $userId,
            'id_subtest' => $id_subtest,
            'score' => $hasil,
        ];

        Score::create($rules);
        $id_tryout = $tryout->id;
        
        $nextSubtestId = $id_subtest + 1;
        if ($nextSubtestId == 8 && $id_tryout == 1 || $nextSubtestId == 11 && $id_tryout == 2){
            return redirect("/results");
        } else {
            return redirect("/tryout/{$id_tryout}/test?subtest={$nextSubtestId}");
        }
        
    }


    public function submitAnswer(Request $request)
    {
        dd($request);
        $questionId = $request->input('questionId');
        $selectedOption = $request->input('selectedOption');
        // $userAnswers = $request->input('answers');
        // $subtestId = $request->input('subtestId');
        // $tryoutId = $request->input('tryoutId');
        // $score = 0;

        // foreach ($userAnswers as $questionId => $userAnswer) {
        //     $question = Question::find($questionId);

        //     if ($question && $question->correct_answer === $userAnswer) {
        //         $score += 1;
        //     }
        // }

        // // Save the score to the database
        // $userId = auth()->id(); // Assuming you have authentication
        // $score = $score * 10;
        // // Adjust the code based on your database structure
        // // For example, you may have a table named 'user_scores'
        // // $userScore = UserScore::create(['user_id' => $userId, 'tryout_id' => $tryoutId, 'subtest_id' => $subtestId, 'score' => $score]);

        // return response()->json(['success' => true, 'message' => 'Answers submitted successfully']);
    }
}
