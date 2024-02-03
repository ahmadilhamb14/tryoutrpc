@extends('dashboard.layouts.main')

@section('container')
    <div class="m-3">
        @foreach ($tryouts as $tryout)
            <div class="row justify-content-between mb-3">
                <div class="col-4">
                    <h5 class="">Edit Soal Tryout {{ $tryout['tryout'] }}</h5>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <button class="btn btn-secondary text-light">Kembali</button>
                </div>
            </div>
        @endforeach
        <br>
        <form action="/tryout/{{ $tryout->id }}/soaltryout/{{ $questions->id }}" method="post"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="hidden" value="{{ $tryout->id }}" name="id_tryout">
            <input type="hidden" value="{{ $questions->id }}" name="id_question">
            <div class="mb-5">
                @if ($questions->image)
                    <label for="image">Gambar Saat Ini:</label><br><br>
                    <img src="{{ asset('storage/post-images/' . $questions->image) }}" alt="Gambar Saat Ini" width="400">
                    <br><br>
                    <label for="image" class="form-label">Pilih Gambar Baru</label>
                    <br>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="image" name="new_image" onchange=previewImage()>
                @else
                    <label for="image" class="form-label">Gambar</label>
                    <br>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="image" name="image" onchange=previewImage()>
                @endif
            </div>
            <div>
                <label for="question">Soal</label>
                <input id="question" type="hidden" name="question" value="{{ old('question', $questions->question) }}">
                <trix-editor input="question">
                </trix-editor>
            </div>
            <div class="my-5">
                <label for="id_subtest" class="col-form-label">Subtes</label>
                <div>
                    <select class="form-select" name="id_subtest" id="id_subtest">
                        @foreach ($subtests as $subtest)
                            @if (old('id_subtest', $subtest->id) == $questions->subtest->id)
                                <option value="{{ $subtest->id }}" selected>{{ $questions->subtest->subtes }}</option>
                            @else
                                <option value="{{ $subtest->id }}">{{ $subtest->subtes }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <p>Pilihan A</p>
            <div class="mt-2">
                @if (substr($questions->option_a, -3) === 'png' ||
                        substr($questions->option_a, -3) === 'jpg' ||
                        substr($questions->option_a, -3) === 'peg')
                    <p>Gambar saat ini</p>
                    <img src="{{ asset('storage/post-images/' . $questions->option_a) }}" alt="" width="400">
                    <br><br>
                    <label for="g_option_a" class="form-label">Pilih gambar baru</label>
                    <br>
                    <img class="img-previewA img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="g_option_a" name="new_g_option_a"
                        onchange=previewImageA()>
                @else
                    <label for="option_a">Teks</label>
                    <input id="a" type="hidden" name="option_a"
                        value="{{ old('option_a', $questions->option_a) }}">
                    <trix-editor input="a"></trix-editor>
                    <div class="mt-3 mb-5">
                        <label for="g_option_a" class="form-label">Gambar</label>
                        <br>
                        <img class="img-previewA img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="g_option_a" name="g_option_a"
                            onchange=previewImageA()>
                    </div>
                @endif
            </div>
            <p class="mt-5">Pilihan B</p>
            <div class="mt-2">
                @if (substr($questions->option_b, -3) === 'png' ||
                        substr($questions->option_b, -3) === 'jpg' ||
                        substr($questions->option_b, -3) === 'peg')
                    <p>Gambar saat ini</p>
                    <img src="{{ asset('storage/post-images/' . $questions->option_b) }}" alt="" width="400">
                    <br><br>
                    <label for="g_option_b" class="form-label">Pilih gambar baru</label>
                    <br>
                    <img class="img-previewB img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="g_option_b" name="new_g_option_b"
                        onchange=previewImageB()>
                @else
                    <label for="option_b">Teks</label>
                    <input id="a" type="hidden" name="option_b"
                        value="{{ old('option_b', $questions->option_b) }}">
                    <trix-editor input="a"></trix-editor>
                    <div class="mt-3 mb-5">
                        <label for="g_option_b" class="form-label">Gambar</label>
                        <br>
                        <img class="img-previewB img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="g_option_b" name="g_option_b"
                            onchange=previewImageB()>
                    </div>
                @endif
            </div>
            <p class="mt-5">Pilihan C</p>
            <div class="mt-2">
                @if (substr($questions->option_c, -3) === 'png' ||
                        substr($questions->option_c, -3) === 'jpg' ||
                        substr($questions->option_c, -3) === 'peg')
                    <p>Gambar saat ini</p>
                    <img src="{{ asset('storage/post-images/' . $questions->option_c) }}" alt="" width="400">
                    <br><br>
                    <label for="g_option_c" class="form-label">Pilih gambar baru</label>
                    <br>
                    <img class="img-previewC img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="g_option_c" name="new_g_option_c"
                        onchange=previewImageC()>
                @else
                    <label for="option_c">Teks</label>
                    <input id="a" type="hidden" name="option_c"
                        value="{{ old('option_c', $questions->option_c) }}">
                    <trix-editor input="a"></trix-editor>
                    <div class="mt-3 mb-5">
                        <label for="g_option_c" class="form-label">Gambar</label>
                        <br>
                        <img class="img-previewC img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="g_option_c" name="g_option_c"
                            onchange=previewImageC()>
                    </div>
                @endif
            </div>
            <p class="mt-5">Pilihan D</p>
            <div class="mt-2">
                @if (substr($questions->option_d, -3) === 'png' ||
                        substr($questions->option_d, -3) === 'jpg' ||
                        substr($questions->option_d, -3) === 'peg')
                    <p>Gambar saat ini</p>
                    <img src="{{ asset('storage/post-images/' . $questions->option_d) }}" alt="" width="400">
                    <br><br>
                    <label for="g_option_d" class="form-label">Pilih gambar baru</label>
                    <br>
                    <img class="img-previewD img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="g_option_d" name="new_g_option_d"
                        onchange=previewImageD()>
                @else
                    <label for="option_d">Teks</label>
                    <input id="a" type="hidden" name="option_d"
                        value="{{ old('option_d', $questions->option_d) }}">
                    <trix-editor input="a"></trix-editor>
                    <div class="mt-3 mb-5">
                        <label for="g_option_d" class="form-label">Gambar</label>
                        <br>
                        <img class="img-previewD img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="g_option_d" name="g_option_d"
                            onchange=previewImageD()>
                    </div>
                @endif
            </div>
            <p class="mt-5">Pilihan E</p>
            <div class="mt-2 mb-5">
                @if (substr($questions->option_e, -3) === 'png' ||
                        substr($questions->option_e, -3) === 'jpg' ||
                        substr($questions->option_e, -3) === 'peg')
                    <p>Gambar saat ini</p>
                    <img src="{{ asset('storage/post-images/' . $questions->option_e) }}" alt="" width="400">
                    <br><br>
                    <label for="g_option_e" class="form-label">Pilih gambar baru</label>
                    <br>
                    <img class="img-previewE img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="g_option_e" name="new_g_option_e"
                        onchange=previewImageE()>
                @else
                    <label for="option_e">Teks</label>
                    <input id="a" type="hidden" name="option_e"
                        value="{{ old('option_e', $questions->option_e) }}">
                    <trix-editor input="a"></trix-editor>
                    <div class="mt-3 mb-5">
                        <label for="g_option_e" class="form-label">Gambar</label>
                        <br>
                        <img class="img-previewE img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="g_option_e" name="g_option_e"
                            onchange=previewImageE()>
                    </div>
                @endif
            </div>
            <div>
                <label for="option_key">Jawaban</label>
                <br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="A"
                        {{ $questions->option_key === 'A' ? 'checked' : '' }}>
                    <label class="form-check-label" for="option_key1">
                        A
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="option_key" id="option_key2" value="B"
                        {{ $questions->option_key === 'B' ? 'checked' : '' }}>
                    <label class="form-check-label" for="option_key2">
                        B
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="option_key" id="option_key3" value="C"
                        {{ $questions->option_key === 'C' ? 'checked' : '' }}>
                    <label class="form-check-label" for="option_key3">
                        C
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="option_key" id="option_key4" value="D"
                        {{ $questions->option_key === 'D' ? 'checked' : '' }}>
                    <label class="form-check-label" for="option_key4">
                        D
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="option_key" id="option_key5" value="E"
                        {{ $questions->option_key === 'E' ? 'checked' : '' }}>
                    <label class="form-check-label" for="option_key5">
                        E
                    </label>
                </div>

                <center>
                    <div>
                        <button href="/tryout" class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </center>
        </form>
    </div>

    <script>
        function previewImage() {
            var input = document.getElementById('image');
            var preview = document.querySelector('.img-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
            }
        }

        function previewImageA() {
            var optionA = document.getElementById('g_option_a');
            var previewA = document.querySelector('.img-previewA');

            if (optionA.files && optionA.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewA.src = e.target.result;
                };

                reader.readAsDataURL(optionA.files[0]);
            } else {
                previewA.src = '';
            }
        }

        function previewImageB() {
            var optionB = document.getElementById('g_option_b');
            var previewB = document.querySelector('.img-previewB');

            if (optionB.files && optionB.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewB.src = e.target.result;
                };

                reader.readAsDataURL(optionB.files[0]);
            } else {
                previewB.src = '';
            }
        }

        function previewImageC() {
            var optionC = document.getElementById('g_option_c');
            var previewC = document.querySelector('.img-previewC');

            if (optionC.files && optionC.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewC.src = e.target.result;
                };

                reader.readAsDataURL(optionC.files[0]);
            } else {
                previewC.src = '';
            }
        }

        function previewImageD() {
            var optionD = document.getElementById('g_option_d');
            var previewD = document.querySelector('.img-previewD');

            if (optionD.files && optionD.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewD.src = e.target.result;
                };

                reader.readAsDataURL(optionD.files[0]);
            } else {
                previewD.src = '';
            }
        }

        function previewImageE() {
            var optionE = document.getElementById('g_option_e');
            var previewE = document.querySelector('.img-previewE');

            if (optionE.files && optionE.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewE.src = e.target.result;
                };

                reader.readAsDataURL(optionE.files[0]);
            } else {
                previewE.src = '';
            }
        }
    </script>
@endsection
