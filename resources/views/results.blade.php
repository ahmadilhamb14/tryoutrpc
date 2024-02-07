@extends('dashboard.layouts.main')

@section('container')
    <div class="users">
        @can('admin')
            {{-- <h4 class="mb-3">Hasil Tryout</h4> --}}
            <div class="row justify-content-between mb-3">
                <div class="col-4">
                    <h4>Hasil Tryout</h4>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <a href="/results/export/excel" class="btn btn-primary">Download</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jenis Tryout</th>
                        <th scope="col">Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rawResults as $item)
                        <form action="/results/detail" method="post">
                            @csrf
                            <tr class="text-center">
                                <td><input type="hidden" name="tanggal" value={{ $item['tanggal'] }}></td>
                                <td><input type="hidden" name="tryout" value={{ $item['tryout'] }}></td>
                                <td><input type="hidden" name="id" value={{ $item['id'] }}></td>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $item['fullname'] }}</td>
                                <td>{{ $item['tanggal'] }}</td>
                                <td>{{ $item['tryout'] }}</td>
                                <td>
                                    <div class="row justify-content-between">
                                        <div class="col">
                                            {{ $item['total_score'] }}
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-success mx-2" href="/results/detail">
                                                <span data-feather="eye"></span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endcan
    @can('non-admin')
        <h4 class="mb-2">Review Score Tryout</h4>
        {{ $user->fullname }}
        <br>
        <br>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th></th>
                    <th></th>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis Tryout</th>
                    <th scope="col">Skor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rawResults1 as $item)
                    <form action="results/detail" method="post">
                        @csrf
                        <tr class="text-center">
                            <td><input type="hidden" name="tanggal" value={{ $item['tanggal'] }}></td>
                            <td><input type="hidden" name="tryout" value={{ $item['tryout'] }}></td>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item['tanggal'] }}</td>
                            <td>{{ $item['tryout'] }}</td>
                            <td>
                                <div class="row justify-content-between">
                                    <div class="col">
                                        {{ $item['total_score'] }}
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-success mx-2" type="submit">
                                            <span data-feather="eye"></span>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
        </div>
    @endcan
@endsection
