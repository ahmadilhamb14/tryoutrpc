@extends('dashboard.layouts.main')

@section('container')
<div class="detail-soal">
    @foreach ($tryouts as $tryout)
    <h4 class="">Tryout {{$tryout['tryout']}}</h4>
    @endforeach
    <br>
    <h5><b>Soal</b></h5>
    {{ $questions->question }}
    <br><br>
    <h5><b>Subtes</b></h5>
    {{ $questions->subtest->subtes }}
    <br><br>
    <h5><b>Pilihan A</b></h5>
    {{ $questions->option_a }}
    <br><br>
    <h5><b>Pilihan B</b></h5>
    {{ $questions->option_b }}
    <br><br>
    <h5><b>Pilihan C</b></h5>
    {{ $questions->option_c }}
    <br><br>
    <h5><b>Pilihan D</b></h5>
    {{ $questions->option_d }}
    <br><br>
    <h5><b>Pilihan E</b></h5>
    {{ $questions->option_e }}
    <br><br>
    <h5><b>Jawaban</b></h5>
    {{ $questions->option_key }}

</div>
@endsection