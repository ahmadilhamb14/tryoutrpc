@extends('dashboard.layouts.main')

@section('container')
<div class="users">
    <h4 class="mt-4">UTBK-SNBT</h4>
    <button class=" mb-3 px-2" style="border-radius: 10px; border: none; background-color: rgb(61, 84, 214); color: rgb(255, 255, 255); font-weight: bold;" >
        Tambah Soal
    </button>
    <div class="hack1">
    <div class="hack2">
    <table class="table table-striped table-bordered" id="dtHorizontalExample">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Soal</th>
                <th scope="col">Subtes</th>
                <th scope="col">Gambar</th>
                <th scope="col">Pilihan A</th>
                <th scope="col">Pilihan B</th>
                <th scope="col">Pilihan C</th>
                <th scope="col">Pilihan D</th>
                <th scope="col">Pilihan E</th>
                <th scope="col">Pilihan Benar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td scope="row">1</td>
                <td>
                    <div class="text-nowrap overflow-x-hidden text-truncate">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum illo ea hic optio maiores.
                    </div>
                </td>
                <td>penalaran matematika</td>
                <td>foto.jpg</td>
                <td>
                    <div class="text-nowrap overflow-x-hidden text-truncate">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum illo ea hic optio maiores.
                    </div>
                </td>
                <td><div class="text-nowrap overflow-x-hidden text-truncate">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum illo ea hic optio maiores.
                    </div>
                </td>
                <td>
                    <div class="text-nowrap overflow-x-hidden text-truncate">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum illo ea hic optio maiores.
                    </div>
                </td>
                <td>
                    <div class="text-nowrap overflow-x-hidden text-truncate">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum illo ea hic optio maiores.
                    </div>
                </td>
                <td>
                    <div class="text-nowrap overflow-x-hidden text-truncate">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum illo ea hic optio maiores.
                    </div>
                </td>
                <td>A</td>
                <td>
                    <div>
                        <a href="" class="badge bg-success"><span
                            data-feather="eye"></span></a>
                        <a href="" class="badge bg-warning"><span
                            data-feather="edit"></span></a>
                        <form action="" method="POST" class="d-inline">
                        @method('delete')
                          @csrf
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Apakah kamu yakin ingin menghapus data?')"><span
                                  data-feather="trash-2"></span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table> 
    </div>
</div>
</div>
@endsection