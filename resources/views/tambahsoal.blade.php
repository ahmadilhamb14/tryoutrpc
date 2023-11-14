<!-- Mengambil Layout utama -->
@extends('dashboard.layouts.main')

@section('container')
<div class="m-3">
    <h3>Tambah Soal</h3>
    <br>
    <form action="/tryout/kelola" method="post">
        @csrf
        <div>
            <label for="soal">Soal</label>
            <trix-editor input="textarea"></trix-editor>
            <input id="textarea" type="hidden" name="question">
        </div>
        <div class="my-5">
            <label for="option_a">Pilihan A</label>
            <trix-editor input=""></trix-editor>
            <input id="body" type="hidden" name="option_a">
        </div>
        <div class="my-5">
            <label for="option_b">Piliihan B</label>
            <trix-editor input=""></trix-editor>
            <input id="body" type="hidden" name="option_b">
        </div>
        <div class="my-5">
            <label for="option_c">Pilihan C</label>
            <trix-editor input=""></trix-editor>
            <input id="body" type="hidden" name="option_c">
        </div>
        <div class="my-5">
            <label for="option_d">Pilihan D</label>
            <trix-editor input=""></trix-editor>
            <input id="body" type="hidden" name="option_d">
        </div>
        <div class="my-5">
            <label for="option_e">Pilihan E</label>
            <trix-editor input=""></trix-editor>
            <input id="body" type="hidden" name="option_e">
        </div>
        <div>
            <label for="flexRadioDefault">Jawaban</label>
            <br>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="A">
                <label class="form-check-label" for="flexRadioDefault1">
                    A
                </label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="B">
                <label class="form-check-label" for="flexRadioDefault1">
                    B
                </label>
            </div>
                <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="C">
                <label class="form-check-label" for="flexRadioDefault1">
                    C
                </label>
            </div>
                <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="D">
                <label class="form-check-label" for="flexRadioDefault1">
                    D
                </label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="E">
                <label class="form-check-label" for="flexRadioDefault1">
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
            <button href="" class="btn btn-primary" type="submit">Simpan</button>
        </div>
        </center>
    </form>
</div>


<script>
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
</script>

@endsection