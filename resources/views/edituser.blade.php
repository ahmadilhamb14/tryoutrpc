@extends('dashboard.layouts.main')
@section('container')
    <div class="tryout">
        <div class="row justify-content-between mb-3">
            <div class="col-4">
                <h4>Edit User</h4>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <button onclick="goBack()" class="btn btn-secondary text-light">Kembali</button>
            </div>
        </div>
        <form action="/users/{{ $user->id }}" method="POST" id="form" class="mt-5">
            @method('put')
            @csrf
            <div class="row">
                <div class="row">
                    <div class="col-3">
                        <label for="nama">Nama Lengkap</label>
                    </div>
                    <div class="col-6">
                        : <input type="text" name="fullname" id="nama" class="rounded ms-1 p-1"
                            value="{{ old('fullname', $user->fullname) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for="kabupaten">Kabupaten</label>
                    </div>
                    <div class="col-6">
                        : <select class="rounded ms-1 p-1" id="kabupaten" name="id_kabupaten">
                            @foreach ($kabupatens as $kabupaten)
                                @if ($kabupaten->id == $user->sekolah->kabupaten->id)
                                    <option value="{{ $kabupaten->id }}" selected>{{ $user->sekolah->kabupaten->kabupaten }}
                                    </option>
                                @else
                                    <option value="{{ $kabupaten->id }}">{{ $kabupaten->kabupaten }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for="sekolah">Asal Sekolah</label>
                    </div>
                    <div class="col-6">
                        : <select class="rounded ms-1 p-1" id="id_school" name="id_school">
                            {{-- Initial Sekolahs will be hidden --}}
                            @foreach ($sekolahs as $sekolah)
                                @if (old('id_school', $sekolah->id) == $user->id_school)
                                    <option value="{{ $sekolah->id }}" data-kabupaten="{{ $sekolah->id_kabupaten }}"
                                        style="display: none;" selected>{{ $user->sekolah->sekolah }}</option>
                                @else
                                    <option value="{{ $sekolah->id }}" data-kabupaten="{{ $sekolah->id_kabupaten }}"
                                        style="display: none;">{{ $sekolah->sekolah }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-6">
                        : <input type="text" name="username" id="username-input" class="rounded ms-1 p-1"
                            value="{{ old('username', $user->username) }}">
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary text-align-center mt-4">Simpan</button>
        </form>
    </div>

    <script>
        document.getElementById('kabupaten').addEventListener('change', function() {
            var selectedKabupaten = this.value;
            var sekolahOptions = document.querySelectorAll('#id_school option');

            sekolahOptions.forEach(function(option) {
                if (option.dataset.kabupaten == selectedKabupaten || selectedKabupaten === '') {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
        });
    </script>
@endsection
