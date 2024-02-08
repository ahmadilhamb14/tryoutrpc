@extends('dashboard.layouts.main')
@section('container')
    <div class="profile">
        <div class="d-flex justify-content-end">
            <button onclick="goBack()" class="btn btn-secondary text-light">Kembali</button>
        </div>
        <div class="top">
            <div class="text" style="background-color: #FFC107;">
                <h4>Profile</h4>
            </div>
            <div class="picture">
                <i class="fa-regular fa-circle-user"></i>
            </div>
        </div>
        <div class="konten">
            <form action="/profile/edit/{{ $profile->id }}" method="POST">
                @method('put')
                @csrf
                <h1>{{ auth()->user()->fullname }}</h1>
                <div class="row justify-content-center my-3">
                    <div class="px-5">
                        <div class="mb-2">
                            <p class="m-0">Nama Lengkap</p>
                            <input class="@error('fullname') is-invalid @enderror rounded px-2" type="text"
                                name="fullname" value="{{ old('fullname', $profile->fullname) }}"
                                style="border-radius: 6px; width:228px; height:33px; border: 1px solid">
                            @error('fullname')
                                <div class="mt-1 invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <p class="m-0">Kabupaten</p>
                            <select class="rounded p-1" id="kabupaten" name="id_kabupaten"
                                style="border-radius: 6px; width:228px; height:33px; border: 1px solid">
                                @foreach ($kabupatens as $kabupaten)
                                    @if ($kabupaten->id == $profile->sekolah->kabupaten->id)
                                        <option value="{{ $kabupaten->id }}" selected>
                                            {{ $profile->sekolah->kabupaten->kabupaten }}
                                        </option>
                                    @else
                                        <option value="{{ $kabupaten->id }}">{{ $kabupaten->kabupaten }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <p class="m-0">Asal Sekolah</p>
                            <select class="rounded p-1" id="id_school" name="id_school"
                                style="border-radius: 6px; width:228px; height:33px; border: 1px solid">
                                {{-- Initial Sekolahs will be hidden --}}
                                @foreach ($sekolahs as $sekolah)
                                    @if (old('id_school', $sekolah->id) == $profile->id_school)
                                        <option value="{{ $sekolah->id }}" data-kabupaten="{{ $sekolah->id_kabupaten }}"
                                            style="display: none;" selected>{{ $profile->sekolah->sekolah }}</option>
                                    @else
                                        <option value="{{ $sekolah->id }}" data-kabupaten="{{ $sekolah->id_kabupaten }}"
                                            style="display: none;">{{ $sekolah->sekolah }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <p class="m-0">Username</p>
                            <input class="@error('username') is-invalid @enderror rounded px-2" type="text"
                                name="username" value="{{ old('username', $profile->username) }}"
                                style="border-radius: 6px; width:228px; height:33px; border: 1px solid">
                            @error('username')
                                <div class="mt-1 invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <p class="m-0">Password</p>
                            <input class="@error('password') is-invalid @enderror rounded px-2" type="password"
                                name="password" style="border-radius: 6px; width:228px; height:33px; border: 1px solid">
                            @error('password')
                                <div class="mt-1 invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mx-5 my-3 px-3">Simpan</button>
            </form>
        </div>
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
