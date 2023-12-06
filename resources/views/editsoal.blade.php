@extends('dashboard.layouts.main')

@section('container')
<div class="m-3">
    @foreach ($tryouts as $tryout)
    <h3 class="">Edit Soal Tryout {{$tryout['tryout']}}</h3>
    @endforeach
    <br>
    <form action="/tryout/{{$tryout->id}}/soaltryout/{{$questions->id}}" method="post">
        @method('put')
        @csrf
        <input type="hidden" value="{{$tryout->id}}" name="id_tryout">
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
                    <option value="{{ $questions->subtest->id }}" selected>{{ $questions->subtest->subtes }}</option>
                    @else
                    <option value="{{ $subtest->id }}">{{ $subtest->subtes }}</option>
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
            <label for="option_key">Jawaban</label>
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
        </div>
        <div class="my-5">
            <label for="image" class="form-label">Gambar</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control" type="file" id="image" name="image" onchange=previewImage()>
        </div>
        <br>
        <center>
        <div>
            <button href="/tryout" class="btn btn-primary" type="submit">Simpan</button>
        </div>
        </center>
    </form>
</div>
@endsection