<?php

namespace App\Exports;
use App\Models\Score;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportScore implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $data = Score::all();
        $data = Score::with(['user', 'tryout', 'subtest'])
    ->select('fullname', 'sekolahs.sekolah', 'tryouts.tryout', 'subtes', 'score', 'scores.created_at')
    ->join('users', 'scores.id_user', '=', 'users.id')
    ->join('sekolahs', 'users.id_school', '=', 'sekolahs.id')
    ->join('sub_tests', 'scores.id_subtest', '=', 'sub_tests.id')
    ->join('tryouts', 'sub_tests.id_tryout', '=', 'tryouts.id')
    ->orderBy('scores.created_at', 'asc')
    ->orderBy('users.fullname', 'asc')  
    ->get();
        return $data;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Asal Sekolah',
            'Tryout',
            'Subtest',
            'Score',
            'Created At',
        ];
    }
}
