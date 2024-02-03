<!-- Mengambil Layout utama -->
@extends('dashboard.layouts.main')

@section('container')
    <div class="m-3">
        @foreach ($tryouts as $tryout)
            <div class="row justify-content-between mb-3">
                <div class="col-4">
                    <h5 class="">Tambah Soal Tryout {{ $tryout['tryout'] }}</h5>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <button class="btn btn-secondary text-light">Kembali</button>
                </div>
            </div>
        @endforeach
        <br>
        <form action="/tryout/{{ $tryout->id }}/soaltryout" method="post" enctype="multipart/form-data">
            <input type="hidden" value="{{ $tryout->id }}" name="id_tryout">
            @csrf
            <div class="mb-5">
                <label for="image" class="form-label">Gambar</label>
                <br>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control" type="file" id="image" name="image" onchange=previewImage()>
            </div>
            <div>
                <label for="question">Soal</label>
                <trix-editor input="textarea"></trix-editor>
                <input id="textarea" type="hidden" name="question" required>
            </div>

            <div class="my-5">
                <label for="id_subtest" class="col-form-label">Subtes</label>
                <div>
                    <select class="form-select" name="id_subtest">
                        @foreach ($subtests as $subtest)
                            @if (old('id_subtest') == $subtest->id)
                                <option value="{{ $subtest->id }}" selected>{{ $subtest->subtes }}</option>
                            @else
                                <option value="{{ $subtest->id }}">{{ $subtest->subtes }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <p>Pilihan A</p>
            <div class="mt-2">
                <label for="option_a">Teks</label>
                <trix-editor input="option_a"></trix-editor>
                <input id="option_a" type="hidden" name="option_a">
            </div>
            <div class="mt-2 mb-5">
                <label for="g_option_a" class="form-label">Gambar</label>
                <br>
                <img class="img-previewA img-fluid col-sm-5">
                <input class="form-control" type="file" id="g_option_a" name="g_option_a" onchange=previewImageA()>
            </div>
            <p>Pilihan B</p>
            <div class="mt-2">
                <label for="option_b">Teks</label>
                <trix-editor input="option_b" data-direct-upload-url="/tryout/{{ $tryout->id }}/soaltryout"></trix-editor>
                <input id="option_b" type="hidden" name="option_b">
            </div>
            <div class="mt-2 mb-5">
                <label for="g_option_b" class="form-label">Gambar</label>
                <br>
                <img class="img-previewB img-fluid col-sm-5">
                <input class="form-control" type="file" id="g_option_b" name="g_option_b" onchange=previewImageB()>
            </div>
            <p>Pilihan C</p>
            <div class="mt-2">
                <label for="option_c">Teks</label>
                <trix-editor input="option_c" data-direct-upload-url="/tryout/{{ $tryout->id }}/soaltryout"></trix-editor>
                <input id="option_c" type="hidden" name="option_c">
            </div>
            <div class="mt-2 mb-5">
                <label for="g_option_c" class="form-label">Gambar</label>
                <br>
                <img class="img-previewC img-fluid col-sm-5">
                <input class="form-control" type="file" id="g_option_c" name="g_option_c" onchange=previewImageC()>
            </div>
            <p>Pilihan D</p>
            <div class="mt-2">
                <label for="option_d">Teks</label>
                <trix-editor input="option_d" data-direct-upload-url="/tryout/{{ $tryout->id }}/soaltryout"></trix-editor>
                <input id="option_d" type="hidden" name="option_d">
            </div>
            <div class="mt-2 mb-5">
                <label for="g_option_d" class="form-label">Gambar</label>
                <br>
                <img class="img-previewD img-fluid col-sm-5">
                <input class="form-control" type="file" id="g_option_d" name="g_option_d" onchange=previewImageD()>
            </div>
            <p>Pilihan E</p>
            <div class="mt-2">
                <label for="option_e">Teks</label>
                <trix-editor input="option_e"
                    data-direct-upload-url="/tryout/{{ $tryout->id }}/soaltryout"></trix-editor>
                <input id="option_e" type="hidden" name="option_e">
            </div>
            <div class="mt-2 mb-5">
                <label for="g_option_e" class="form-label">Gambar</label>
                <br>
                <img class="img-previewE img-fluid col-sm-5">
                <input class="form-control" type="file" id="g_option_e" name="g_option_e" onchange=previewImageE()>
            </div>
            <div>
                <label for="option_key">Jawaban</label>
                <br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="A"
                        required>
                    <label class="form-check-label" for="option_key1">
                        A
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="B"
                        required>
                    <label class="form-check-label" for="option_key1">
                        B
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="C"
                        required>
                    <label class="form-check-label" for="option_key1">
                        C
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="D"
                        required>
                    <label class="form-check-label" for="option_key1">
                        D
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="E"
                        required>
                    <label class="form-check-label" for="option_key1">
                        E
                    </label>
                </div>
            </div>
            <br>
            <center>
                <div>
                    <button class="btn btn-primary" type="submit" href="">Simpan</button>
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
