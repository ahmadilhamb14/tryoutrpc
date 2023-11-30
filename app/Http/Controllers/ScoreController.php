<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Execute the raw SQL query
        $rawSql = "SELECT users.fullname, tryouts.tryout, SUM(scores.score) as score
                    FROM scores
                    JOIN users ON scores.id_user = users.id
                    JOIN sub_tests ON sub_tests.id = scores.id_subtest
                    JOIN tryouts ON tryouts.id = sub_tests.id_tryout
                    GROUP BY scores.id_user, sub_tests.id_tryout";

        $rawResults = DB::select($rawSql);

        // dd($rawResults);

        // Convert raw results to a more manageable format
        $formattedResults = [];
        foreach ($rawResults as $rawResult) {
        $formattedResults[] = [
            'fullname' => $rawResult->fullname,
            'tryout' => $rawResult->tryout,
            'total_score' => $rawResult->score,
            ];
        }

        // dd($formattedResults);

        // Pass the formatted results to the view
        return view('results', [
            // 'scores' => Score::with('user', 'subtest.tryout')->get(),
            'scores' => Score::with('user', 'subtest.tryout')->get(),
            'rawResults' => $formattedResults,
            "title" => "Results"
        ]);
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
     * @param  \App\Http\Requests\StoreScoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreScoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScoreRequest  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateScoreRequest $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
