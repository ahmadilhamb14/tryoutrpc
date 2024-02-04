@extends('dashboard.layouts.main')

@section('container')
    <div class="detail-soal">
        @foreach ($tryouts as $tryout)
            <div class="row justify-content-between mb-3">
                <div class="col-4">
                    <h4 class="">Tryout {{ $tryout['tryout'] }}</h4>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <button onclick="goBack()" class="btn btn-secondary text-light">Kembali</button>
                </div>
            </div>
        @endforeach
        <br>
        <h5><b>Gambar</b></h5>
        @if ($questions->image)
            <img src="{{ asset('storage/post-images/' . $questions->image) }}" alt="" width="500">
        @else
            Tidak ada gambar
        @endif
        <br>
        <h5><b>Soal</b></h5>
        {!! $questions->question !!}
        <br><br>
        <h5><b>Subtes</b></h5>
        {{ $questions->subtest->subtes }}
        <br><br>
        <h5><b>Pilihan A</b></h5>
        @if (substr($questions->option_a, -3) === 'png' ||
                substr($questions->option_a, -3) === 'jpg' ||
                substr($questions->option_a, -3) === 'peg')
            <img src="{{ asset('storage/post-images/' . $questions->option_a) }}" alt="" width="100">
        @else
            {!! $questions->option_a !!}
        @endif
        <br><br>
        <h5><b>Pilihan B</b></h5>
        @if (substr($questions->option_b, -3) === 'png' ||
                substr($questions->option_b, -3) === 'jpg' ||
                substr($questions->option_b, -3) === 'peg')
            <img src="{{ asset('storage/post-images/' . $questions->option_b) }}" alt="" width="100">
        @else
            {!! $questions->option_b !!}
        @endif
        <br><br>
        <h5><b>Pilihan C</b></h5>
        @if (substr($questions->option_c, -3) === 'png' ||
                substr($questions->option_c, -3) === 'jpg' ||
                substr($questions->option_c, -3) === 'peg')
            <img src="{{ asset('storage/post-images/' . $questions->option_c) }}" alt="" width="100">
        @else
            {!! $questions->option_c !!}
        @endif
        <br><br>
        <h5><b>Pilihan D</b></h5>
        @if (substr($questions->option_d, -3) === 'png' ||
                substr($questions->option_d, -3) === 'jpg' ||
                substr($questions->option_d, -3) === 'peg')
            <img src="{{ asset('storage/post-images/' . $questions->option_d) }}" alt="" width="100">
        @else
            {!! $questions->option_d !!}
        @endif
        <br><br>
        <h5><b>Pilihan E</b></h5>
        @if (substr($questions->option_e, -3) === 'png' ||
                substr($questions->option_e, -3) === 'jpg' ||
                substr($questions->option_e, -3) === 'peg')
            <img src="{{ asset('storage/post-images/' . $questions->option_e) }}" alt="" width="100">
        @else
            {!! $questions->option_e !!}
        @endif
        <br><br>
        <h5><b>Jawaban</b></h5>
        {{ $questions->option_key }}
        <br><br>
    </div>
@endsection
