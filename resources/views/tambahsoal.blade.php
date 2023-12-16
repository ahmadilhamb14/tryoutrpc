<!-- Mengambil Layout utama -->
@extends('dashboard.layouts.main')

@section('container')
<div class="m-3">
    @foreach ($tryouts as $tryout)
    <h3 class="">Tambah Soal Tryout {{$tryout['tryout']}}</h3>
    @endforeach
    <br>
    <form action="/tryout/{{$tryout->id}}/soaltryout" method="post" enctype="multipart/form-data">
        <input type="hidden" value="{{$tryout->id}}" name="id_tryout">
        @csrf
        <div>
            <label for="question">Soal</label>
            <trix-editor input="textarea"></trix-editor>
            <input id="textarea" type="hidden" name="question">
        </div>

        <div class="my-5">
            <label for="id_subtest" class="col-form-label">Subtes</label>
            <div>
                <select class="form-select" name="id_subtest">
                    @foreach($subtests as $subtest)
                    @if(old('id_subtest') == $subtest->id)
                    <option value="{{ $subtest->id }}" selected>{{ $subtest->subtes }}</option>
                    @else
                    <option value="{{ $subtest->id }}">{{ $subtest->subtes }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
          </div>

        <div class="my-5">
            <label for="option_a">Pilihan A</label>
            <trix-editor input="option_a" data-direct-upload-url="/tryout/{{$tryout->id}}/soaltryout"></trix-editor>
            <input id="option_a" type="hidden" name="option_a">
        </div>
        <div class="my-5">
            <label for="option_b">Piliihan B</label>
            <trix-editor input="option_b" data-direct-upload-url="/tryout/{{$tryout->id}}/soaltryout"></trix-editor>
            <input id="option_b" type="hidden" name="option_b">
        </div>
        <div class="my-5">
            <label for="option_c">Pilihan C</label>
            <trix-editor input="option_c" data-direct-upload-url="/tryout/{{$tryout->id}}/soaltryout"></trix-editor>
            <input id="option_c" type="hidden" name="option_c">
        </div>
        <div class="my-5">
            <label for="option_d">Pilihan D</label>
            <trix-editor input="option_d" data-direct-upload-url="/tryout/{{$tryout->id}}/soaltryout"></trix-editor>
            <input id="option_d" type="hidden" name="option_d">
        </div>
        <div class="my-5">
            <label for="option_e">Pilihan E</label>
            <trix-editor input="option_e" data-direct-upload-url="/tryout/{{$tryout->id}}/soaltryout"></trix-editor>
            <input id="option_e" type="hidden" name="option_e">
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
            <br>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control" type="file" id="image" name="image" onchange=previewImage()>
        </div>
        <br>
        <center>
        <div>
            <button class="btn btn-primary" type="submit" href="">Simpan</button>
        </div>
        </center>
    </form>
</div>


{{-- <script>
    function previewImage() {
    // Ambil Gambar
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector(img-preview);

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
    }
</script> --}}

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