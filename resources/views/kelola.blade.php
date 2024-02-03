@extends('dashboard.layouts.main')

@section('container')
    <div class="users">
        @can('admin')
            @foreach ($tryouts as $tryout)
                <div class="row justify-content-between mb-3">
                    <div class="col-4">
                        <h4 class="">{{ $tryout['tryout'] }}</h4>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <button class="btn btn-secondary text-light">Kembali</button>
                    </div>
                </div>
            @endforeach
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- <a href="/tryout/create" class="btn btn-primary mb-3 px-2"  > --}}
            <div class="d-flex justify-content-between">
                <div>
                    <a href="/tryout/{{ $tryout->id }}/soaltryout/create" class="btn btn-primary mb-3 px-2">
                        Tambah Soal
                    </a>
                </div>
                <div>
                    <form action="/tryout/{{ $tryout->id }}" method="GET">
                        @csrf
                        <div class="d-flex">
                            <div class="my-1 mx-2">
                                <label for="subtest">Filter by Subtest:</label>
                            </div>
                            <div class="mx-2">
                                <select name="subtest" id="subtest" class="form-select">
                                    <option value="">All Subtests</option>
                                    @foreach ($subtests as $subtest)
                                        @if ($subtest->id == session()->get('selected_subtest'))
                                            <option value="{{ $subtest->id }}" selected>{{ $subtest->subtes }}</option>
                                        @else
                                            <option value="{{ $subtest->id }}">{{ $subtest->subtes }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Apply Filter</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

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
                                            {!! $question->question !!}
                                            {{-- {{ strip_tags($question->question) }} --}}
                                        </div>
                                    </td>
                                    <td>{{ $question->subtest->subtes }}</td>
                                    <td>
                                        @if ($question->image)
                                            <img src="{{ asset('storage/post-images/' . $question->image) }}" alt=""
                                                width="100">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-nowrap overflow-x-hidden text-truncate">
                                            @if (substr($question->option_a, -3) === 'png' ||
                                                    substr($question->option_a, -3) === 'jpg' ||
                                                    substr($question->option_a, -3) === 'peg')
                                                <img src="{{ asset('storage/post-images/' . $question->option_a) }}"
                                                    alt="" width="100">
                                            @else
                                                {!! $question->option_a !!}
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap overflow-x-hidden text-truncate">
                                            @if (substr($question->option_b, -3) === 'png' ||
                                                    substr($question->option_b, -3) === 'jpg' ||
                                                    substr($question->option_b, -3) === 'peg')
                                                <img src="{{ asset('storage/post-images/' . $question->option_b) }}"
                                                    alt="" width="100">
                                            @else
                                                {!! $question->option_b !!}
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap overflow-x-hidden text-truncate">
                                            @if (substr($question->option_c, -3) === 'png' ||
                                                    substr($question->option_c, -3) === 'jpg' ||
                                                    substr($question->option_c, -3) === 'peg')
                                                <img src="{{ asset('storage/post-images/' . $question->option_c) }}"
                                                    alt="" width="100">
                                            @else
                                                {!! $question->option_c !!}
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap overflow-x-hidden text-truncate">
                                            @if (substr($question->option_d, -3) === 'png' ||
                                                    substr($question->option_d, -3) === 'jpg' ||
                                                    substr($question->option_d, -3) === 'peg')
                                                <img src="{{ asset('storage/post-images/' . $question->option_d) }}"
                                                    alt="" width="100">
                                            @else
                                                {!! $question->option_d !!}
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap overflow-x-hidden text-truncate">
                                            @if (substr($question->option_e, -3) === 'png' ||
                                                    substr($question->option_e, -3) === 'jpg' ||
                                                    substr($question->option_e, -3) === 'peg')
                                                <img src="{{ asset('storage/post-images/' . $question->option_e) }}"
                                                    alt="" width="100">
                                            @else
                                                {!! $question->option_e !!}
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $question->option_key }}</td>
                                    <td>
                                        <div>
                                            <a href="/tryout/{{ $tryout->id }}/soaltryout/{{ $question->id }}"
                                                class="badge bg-success"><span data-feather="eye"></span></a>
                                            <a href="/tryout/{{ $tryout->id }}/soaltryout/{{ $question->id }}/edit"
                                                class="badge bg-warning"><span data-feather="edit"></span></a>
                                            <form action="/tryout/{{ $tryout->id }}/soaltryout/{{ $question->id }}"
                                                method="POST" class="d-inline">
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
                    @if ($session)
                    @else
                        <div class="float-end">{{ $questions->links() }}</div>
                    @endif
                </div>
            </div>
        @endcan
        @can('non-admin')
            @foreach ($tryouts as $tryout)
                <h4 class="">{{ $tryout['tryout'] }}</h4>
            @endforeach
            <h5 class = "mb-3" style="text-align: center;">Rincian Subtes</h5>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Subtes</th>
                        <th scope="col">Waktu Pengerjaan</th>
                        <th scope="col">Jumlah Soal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subtests as $subtest)
                        <tr class="text-center">
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $subtest['subtes'] }}</td>
                            <td>{{ date('i', strtotime($subtest['timer'])) }} menit</td>
                            <td>{{ $subtest->question->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @php
                $firstSubtestId = $tryout->id == 1 ? 1 : 8;
            @endphp
            <a href="/tryout/{{ $tryout->id }}/test?subtest={{ $firstSubtestId }}"
                class="btn btn-warning px-3 mt-4">START</a>
        @endcan
    </div>
@endsection
