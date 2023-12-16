@extends('dashboard.layouts.main')

@section('container')
<div class="users">
    @can('admin')
    @foreach ($tryouts as $tryout)
    <h4 class="">{{$tryout['tryout']}}</h4>
    @endforeach
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- <a href="/tryout/create" class="btn btn-primary mb-3 px-2"  > --}}
    <a href="/tryout/{{ $tryout->id }}/soaltryout/create" class="btn btn-primary mb-3 px-2"  >
        Tambah Soal
    </a>
    <div class="hack1">
    <div class="hack2">
    <table class="table table-striped table-bordered" id="dtHorizontalExample">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Soal</th>
                <th scope="col">Subtes</th>
                <th scope="col">Gambar</th>
                <th scope="col">Pilihan A</th>
                <th scope="col">Pilihan B</th>
                <th scope="col">Pilihan C</th>
                <th scope="col">Pilihan D</th>
                <th scope="col">Pilihan E</th>
                <th scope="col">Pilihan Benar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
            <tr class="text-center">
                <td scope="row">{{ $loop->iteration }}</td>
                <td>
                    <div class="text-nowrap overflow-x-hidden text-truncate">
                    {{ strip_tags($question->question) }}
                    </div>
                </td>
                <td>{{ $question->subtest->subtes }}</td>
                <td>
                    @if ($question->image)
                    <img src="{{ asset('storage/post-images/' . $question->image) }}" alt="" width="100">
                    @else
                    Tidak ada gambar
                    @endif
                </td>
                <td>
                    <div class="text-nowrap overflow-x-hidden text-truncate">
                    {{ strip_tags($question->option_a) }}
                    </div>
                </td>
                <td><div class="text-nowrap overflow-x-hidden text-truncate">
                    {{ strip_tags($question->option_b) }}
                    </div>
                </td>
                <td>
                    <div class="text-nowrap overflow-x-hidden text-truncate">
                    {{ strip_tags($question->option_c) }}
                    </div>
                </td>
                <td>
                    <div class="text-nowrap overflow-x-hidden text-truncate">
                    {{ strip_tags($question->option_d) }}
                    </div>
                </td>
                <td>
                    <div class="text-nowrap overflow-x-hidden text-truncate">
                    {{ strip_tags($question->option_e) }}
                    </div>
                </td>
                <td>{{ $question->option_key }}</td>
                <td>
                    <div>
                        <a href="/tryout/{{ $tryout->id }}/soaltryout/{{ $question->id }}" class="badge bg-success"><span
                            data-feather="eye"></span></a>
                        <a href="/tryout/{{ $tryout->id }}/soaltryout/{{ $question->id }}/edit" class="badge bg-warning"><span
                            data-feather="edit"></span></a>
                        <form action="/tryout/{{ $tryout->id }}/soaltryout/{{ $question->id }}" method="POST" class="d-inline">
                        @method('delete')
                          @csrf
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Apakah kamu yakin ingin menghapus data?')"><span
                                  data-feather="trash-2"></span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    </div>
</div>
@endcan
@can('non-admin')
@foreach ($tryouts as $tryout)
    <h4 class="">{{$tryout['tryout']}}</h4>
@endforeach
    <h5 class = "mb-3" style="text-align: center;">Rincian Subtes</h5>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th scope="col" >No</th>
                <th scope="col" >Subtes</th>
                <th scope="col" >Waktu Pengerjaan</th>
                <th scope="col" >Jumlah Soal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subtests as $subtest)
            <tr class="text-center">
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{$subtest['subtes']}}</td>
                <td>{{ date('s', strtotime($subtest['timer'])) }} menit</td>
                <td>30</td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    @php
    $firstSubtestId = ($tryout->id == 1) ? 1 : 8;
    @endphp
    <a href="/tryout/{{$tryout->id}}/test?subtest={{ $firstSubtestId }}" class="btn btn-warning px-3 mt-4">START</a>
@endcan
</div>
@endsection