<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestingController extends Controller
{
    //
    public function index()
    {
        // $rawSql = "SELECT users.id, users.fullname, tryouts.tryout, SUM(scores.score) as score, DATE(scores.created_at)
        //             FROM scores
        //             JOIN users ON scores.id_user = users.id
        //             JOIN sub_tests ON sub_tests.id = scores.id_subtest
        //             JOIN tryouts ON tryouts.id = sub_tests.id_tryout
        //             GROUP BY scores.id_user, sub_tests.id_tryout, DATE(scores.created_at)
        //             ORDER BY scores.created_at";

        // $rawResults = DB::select($rawSql);

        // return $rawResults;
        $data = DB::table('mahasiswa')->get();
        return view('testing.testing', ['data' => $data]);
       
    }
}
