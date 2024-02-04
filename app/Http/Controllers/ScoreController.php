<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;
use Illuminate\Http\Request;
use App\Exports\ExportScore;
use Maatwebsite\Excel\Facades\Excel;

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
        $rawSql = "SELECT users.id, users.fullname, tryouts.tryout, SUM(scores.score) as score, DATE(scores.created_at)
                    FROM scores
                    JOIN users ON scores.id_user = users.id
                    JOIN sub_tests ON sub_tests.id = scores.id_subtest
                    JOIN tryouts ON tryouts.id = sub_tests.id_tryout
                    GROUP BY scores.id_user, sub_tests.id_tryout, DATE(scores.created_at)
                    ORDER BY scores.created_at";

        $rawResults = DB::select($rawSql);
        // dd($rawResults);

        // Convert raw results to a more manageable format
        $formattedResults = [];
        foreach ($rawResults as $rawResult) {
        $formattedResults[] = [
            'fullname' => $rawResult->fullname,
            'tryout' => $rawResult->tryout,
            'total_score' => $rawResult->score,
            'tanggal' => $rawResult->{'DATE(scores.created_at)'},
            'id' => $rawResult->id
            ];
        }

        $userId = Auth::id();

        $rawSql1 = "SELECT users.fullname, tryouts.tryout, SUM(scores.score) as score, DATE(scores.created_at)
                    FROM scores
                    JOIN users ON scores.id_user = users.id
                    JOIN sub_tests ON sub_tests.id = scores.id_subtest
                    JOIN tryouts ON tryouts.id = sub_tests.id_tryout
                    where users.id = :userId
                    GROUP BY sub_tests.id_tryout, DATE(scores.created_at)
                    ORDER BY scores.created_at";

        $rawResults1 = DB::select($rawSql1, ['userId' => $userId]);
        // dd($rawResults);

        // Convert raw results to a more manageable format
        $formattedResults1 = [];
        foreach ($rawResults1 as $rawResult1) {
        $formattedResults1[] = [
            'fullname' => $rawResult1->fullname,
            'tryout' => $rawResult1->tryout,
            'total_score' => $rawResult1->score,
            'tanggal' => $rawResult1->{'DATE(scores.created_at)'},
            ];
        }

        // dd($formattedResults);

        $user = User::where('id', $userId)->first();

        $scores = Score::with(['user', 'subtest.tryout'])
        ->where('id_user', $userId)
        ->get();

        // dd($scores);
        // Pass the formatted results to the view
        return view('results', [
            // 'scores' => Score::with('user', 'subtest.tryout')->get(),
            'scores' => Score::with('user', 'subtest.tryout')->get(),
            'rawResults' => $formattedResults,
            'rawResults1' => $formattedResults1,
            "title" => "Results",
            'scores1' => $scores,
            'user' => $user
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
    public function show(Request $request)
    {
        // dd($request);
        $tanggal = $request->input('tanggal');
        $tryout = $request->input('tryout');

        $userId = $request->input('id');
        // dd($userId);

        $userId1 = Auth::id();

        $scores1 = Score::with(['user', 'subtest.tryout'])
        ->where('id_user', $userId1)
        ->whereHas('subtest.tryout', function ($query) use ($tryout) {
            $query->where('tryout', $tryout); // Replace 'tryout_column' with the actual column name
        })
        ->whereDate('created_at', $tanggal)
        ->orderBy('created_at')
        ->get();

        $scores = Score::with(['user', 'subtest.tryout'])
        ->where('id_user', $userId)
        ->whereHas('subtest.tryout', function ($query) use ($tryout) {
            $query->where('tryout', $tryout); // Replace 'tryout_column' with the actual column name
        })
        ->whereDate('created_at', $tanggal)
        ->orderBy('created_at')
        ->get();

        $user = User::where('id', $userId)->first();
        $user1 = User::where('id', $userId1)->first();

        // dd($scores);
        // Pass the formatted results to the view
        return view('detailresults', [
            // 'scores' => Score::with('user', 'subtest.tryout')->get(),
            'scores' => $scores,
            "title" => "Results",
            'tanggal' => $tanggal,
            'tryout' => $tryout,
            'scores1' => $scores1,
            'user' => $user,
            'user1' => $user1
        ]);
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

    public function export_excel(){
        return Excel::download(new ExportScore, "score.xlsx");
    }
}
