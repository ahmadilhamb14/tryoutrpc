@extends('dashboard.layouts.main')

@section('container')
<div class="m-3">
    @foreach ($tryouts as $tryout)
    <h3 class="">Edit Soal Tryout {{$tryout['tryout']}}</h3>
    @endforeach
    <br>
    <form action="/tryout/{{$tryout->id}}/soaltryout/{{$questions->id}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <input type="hidden" value="{{$tryout->id}}" name="id_tryout">
        <input type="hidden" value="{{$questions->id}}" name="id_question">
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
                @foreach($subtests as $subtest)
                    @if(old('id_subtest',  $subtest->id) ==  $questions->subtest->id)
                        <option value="{{ $subtest->id }}" selected>{{ $questions->subtest->id }}</option>
                    @else
                        <option value="{{ $subtest->id }}">{{ $subtest->id }}</option>
                    @endif
                @endforeach
              </select>
              {{-- <select class="form-control" name="id_subtest" id="id_subtest">
                @foreach($subtests as $subtest)
                    <option value="{{ $subtest->id }}" {{ (old('id_subtest', optional($questions->subtest)->id) == $subtest->id) ? 'selected' : '' }}>
                        {{ $subtest->subtes }}
                    </option>
                @endforeach
            </select> --}}
            </div>
          </div>
        <div class="my-5">
            <label for="option_a">Pilihan A</label>
            <input id="a" type="hidden" name="option_a" value="{{ old('option_a', $questions->option_a) }}">
            <trix-editor input="a"></trix-editor>
        </div>
        <div class="my-5">
            <label for="option_b">Piliihan B</label>
            <input id="b" type="hidden" name="option_b" value="{{ old('option_b', $questions->option_b) }}">
            <trix-editor input="b"></trix-editor>
        </div>
        <div class="my-5">
            <label for="option_c">Pilihan C</label>
            <input id="c" type="hidden" name="option_c" value="{{ old('option_c', $questions->option_c) }}">
            <trix-editor input="c"></trix-editor>
        </div>
        <div class="my-5">
            <label for="option_d">Pilihan D</label>
            <input id="d" type="hidden" name="option_d" value="{{ old('option_d', $questions->option_d) }}">
            <trix-editor input="d"></trix-editor>
        </div>
        <div class="my-5">
            <label for="option_e">Pilihan E</label>
            <input id="e" type="hidden" name="option_e" value="{{ old('option_e', $questions->option_e) }}">
            <trix-editor input="e"></trix-editor>
        </div>
        <div>
            {{-- <label for="option_key">Jawaban</label>
            <br>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="A">
                <label class="form-check-label" for="option_key1">
                    A
                </label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="B">
                <label class="form-check-label" for="option_key1">
                    B
                </label>
            </div>
                <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="C">
                <label class="form-check-label" for="option_key1">
                    C
                </label>
            </div>
                <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="D">
                <label class="form-check-label" for="option_key1">
                    D
                </label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="E">
                <label class="form-check-label" for="option_key1">
                    E
                </label>
            </div>
        </div> --}}
        <label for="option_key">Jawaban</label>
<br>
<div class="form-check-inline">
    <input class="form-check-input" type="radio" name="option_key" id="option_key1" value="A" {{ $questions->option_key === 'A' ? 'checked' : '' }}>
    <label class="form-check-label" for="option_key1">
        A
    </label>
</div>
<div class="form-check-inline">
    <input class="form-check-input" type="radio" name="option_key" id="option_key2" value="B" {{ $questions->option_key === 'B' ? 'checked' : '' }}>
    <label class="form-check-label" for="option_key2">
        B
    </label>
</div>
<div class="form-check-inline">
    <input class="form-check-input" type="radio" name="option_key" id="option_key3" value="C" {{ $questions->option_key === 'C' ? 'checked' : '' }}>
    <label class="form-check-label" for="option_key3">
        C
    </label>
</div>
<div class="form-check-inline">
    <input class="form-check-input" type="radio" name="option_key" id="option_key4" value="D" {{ $questions->option_key === 'D' ? 'checked' : '' }}>
    <label class="form-check-label" for="option_key4">
        D
    </label>
</div>
<div class="form-check-inline">
    <input class="form-check-input" type="radio" name="option_key" id="option_key5" value="E" {{ $questions->option_key === 'E' ? 'checked' : '' }}>
    <label class="form-check-label" for="option_key5">
        E
    </label>
</div>
        <div class="my-5">
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

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
        }
    }
    // Optional: If you are using jQuery, you can simplify the code
    // $('#image').change(function () {
    //     var input = this;
    //     var preview = $('.img-preview');

    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             preview.attr('src', e.target.result);
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     } else {
    //         preview.attr('src', '');
    //     }
    // });
</script>
@endsection