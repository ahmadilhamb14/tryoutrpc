<!-- Mengambil Layout utama -->
@extends('dashboard.layouts.main')

@section('container')
<div class="m-3">
    <h3>Tambah Soal</h3>
    <br>
    <form action="/tryout" method="post">
        @csrf
        <div>
            <label for="question">Soal</label>
            <trix-editor input="textarea"></trix-editor>
            <input id="textarea" type="hidden" name="question">
        </div>

        <div class="my-5">
            <label for="id_subtest" class="col-form-label">Subtes</label>
            <div>
              <select class="form-control" name="id_subtest" id="id_subtest">
                <option value="">Pilih Subtes</option>
                <option value="1">Kemampuan Penalaran Umum</option>
                <option value="2">Pengetahuan & Pemahaman Umum</option>
                <option value="3">Kemampuan Memahami Bacaan & Menulis</option>
                <option value="4">Pengetahuan Kuantitatif</option>
                <option value="5">Literasi dalam Bahasa Indonesia</option>
                <option value="6">Literasi dalam Bahasa Inggris</option>
                <option value="7">Penalaran Matematika</option>
              </select>
            </div>
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