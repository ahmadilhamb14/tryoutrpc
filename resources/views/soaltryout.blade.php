<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <link href="review_to.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <title>Review Tryout</title>

        <script
			src="https://code.jquery.com/jquery-1.10.2.min.js"
			type="text/javascript"
		></script>

        <?php 
        $waktu = date('i', strtotime($subtest['timer']));
        $subtestId = $tryout->id;
        ?>
		<!-- Script Timer -->
		<script type="text/javascript">
			$(document).ready(function () {
                
				/** Membuat Waktu Mulai Hitung Mundur Dengan
				 * var detik = 0,
				 * var menit = 1,
				 * var jam = 1
				 */
				var detik = 0;
				// var menit = 30;
				var menit = <?php echo $waktu; ?>;
                // var menit = 0;
				var jam = 0;

				/**
				 * Membuat function hitung() sebagai Penghitungan Waktu
				 */
				function hitung() {
					/** setTimout(hitung, 1000) digunakan untuk
					 * mengulang atau merefresh halaman selama 1000 (1 detik)
					 */
					setTimeout(hitung, 1000);

					/** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
					// if (menit < 1 && jam == 0) {
					// 	var peringatan = style="color:red";
					// }

					/** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
					$("#timer").html(
				// 		// '<h6 align="right"' +
				// 		// 	peringatan +
				// 		// 	">Sisa waktu anda : &nbsp;&nbsp;&nbsp;" +
				// 		// 	jam +
				// 		// 	" jam : " +
				// 		// 	menit +
				// 		// 	" menit : " +
				// 		// 	detik +
				// 		// 	" detik</h6>"
							"Sisa waktu anda : &nbsp;&nbsp;&nbsp;" +
							jam +
							" jam : " +
							menit +
							" menit : " +
							detik +
							" detik"
					);
					
					/** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
					detik--;

					/** Jika var detik < 0
					 * var detik akan dikembalikan ke 59
					 * Menit akan Berkurang 1
					 */
					if (detik < 0) {
						detik = 59;
						menit--;

						/** Jika menit < 0
						 * Maka menit akan dikembali ke 59
						 * Jam akan Berkurang 1
						 */
						if (menit < 0) {
							menit = 59;
							jam--;

							/** Jika var jam < 0
							 * clearInterval() Memberhentikan Interval dan submit secara otomatis
							 */
							if (jam < 0) {
								clearInterval();
								/** Variable yang digunakan untuk submit secara otomatis di Form */
                                
								// var frmSoal = document.getElementById("frmSoal");
                                var subtestId = <?php echo $subtestId; ?>;
                                
                                var submitBtn = document.getElementById("next");
                                        submitBtn.click();
                            }
						}
					}
				}
				/** Menjalankan Function Hitung Waktu Mundur */
				hitung();
			})
			// ]]>
            
		</script>
</head>
<body>
    <p id="timer" align="right" class="text-light p-3 bg-dark fixed-top">Sisa Waktu: 00:00:00</p>	
    <br><br><br>
    <center>
        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h5 class="mb-3">{{ $subtest->subtes }} </h5>
    </center>
    <form id="form" action="/tryout/{{$tryout->id}}/test" method="post">
        @csrf
    @foreach($questions as $question)
    <table border="0" class="m-3 p-2 bg-warning d-flex rounded">
        <tbody>   
                <input type="hidden" name="id[]" value="{{$question->id}}">
                <input type="hidden" name="id_subtes" value="{{$subtest->id}}">
                <tr>
                    @if ($question->image)
                    <td align="justify">{{ $loop->iteration }}. 
                        <img class="mb-2" src="{{ asset('storage/post-images/' . $question->image) }}" alt="Gambar" width="400">
                        {!!$question->question!!}
                    </td>
                    <td></td>
                    @else 
                        <td style="display: flex" align="justify"><span class="mx-1">{{ $loop->iteration }}.</span> {!!$question->question!!} </td>
                        <td></td>
                    @endif 
                </tr>
                <tr>
                    @if (substr($question->option_a, -3) === 'png' || substr($question->option_a, -3) === 'jpg' || substr($question->option_a, -3) === 'peg')
                    <td style="display: flex"><input name="pilihan[{{$question->id}}]" type="radio" value="A" style="height:25px; width:25px; vertical-align: middle"> <span class="mx-1"> A.</span>
                        <img src="{{ asset('storage/post-images/' . $question->option_a) }}" alt="" width="400">
                    </td>
                     @else
                     <td style="display: flex"><input name="pilihan[{{$question->id}}]" type="radio" value="A" style="height:25px; width:25px; vertical-align: middle"> <span class="mx-1"> A.</span>
                        {!!$question->option_a!!}</td>
                    <td></td>
                    @endif
                </tr>
                <tr>
                    @if (substr($question->option_b, -3) === 'png' || substr($question->option_b, -3) === 'jpg' || substr($question->option_b, -3) === 'peg')
                    <td class="my-2" style="display: flex"><input name="pilihan[{{$question->id}}]" type="radio" value="B" style="height:25px; width:25px; vertical-align: middle"> <span class="mx-1"> B.</span>
                    <img src="{{ asset('storage/post-images/' . $question->option_b) }}" alt="" width="400">
                    </td>
                    @else 
                    <td style="display: flex"><input name="pilihan[{{$question->id}}]" type="radio" value="B" style="height:25px; width:25px; vertical-align: middle"> <span class="mx-1"> B.</span>
                    {!!$question->option_b!!}</td>
                    <td> </td>
                    @endif
                </tr>
                <tr>
                    @if (substr($question->option_c, -3) === 'png' || substr($question->option_c, -3) === 'jpg' || substr($question->option_c, -3) === 'peg')
                    <td class="mb-2" style="display: flex"><input name="pilihan[{{$question->id}}]" type="radio" value="C" style="height:25px; width:25px; vertical-align: middle"> <span class="mx-1"> C.</span>
                    <img src="{{ asset('storage/post-images/' . $question->option_c) }}" alt="" width="400">
                    </td>
                    @else 
                    <td style="display: flex"><input name="pilihan[{{$question->id}}]" type="radio" value="C" style="height:25px; width:25px; vertical-align: middle"> <span class="mx-1"> C.</span>
                    {!!$question->option_c!!}</td>
                    <td> </td>
                    @endif
                </tr>
                <tr>
                    @if (substr($question->option_d, -3) === 'png' || substr($question->option_d, -3) === 'jpg' || substr($question->option_d, -3) === 'peg')
                    <td class="mb-2" style="display: flex"><input name="pilihan[{{$question->id}}]" type="radio" value="D" style="height:25px; width:25px; vertical-align: middle"> <span class="mx-1"> D.</span>
                    <img src="{{ asset('storage/post-images/' . $question->option_d) }}" alt="" width="400">
                    </td>
                    @else 
                    <td style="display: flex"><input name="pilihan[{{$question->id}}]" type="radio" value="D" style="height:25px; width:25px; vertical-align: middle"> <span class="mx-1"> D.</span>
                    {!!$question->option_d!!}</td>
                    <td> </td>
                    @endif
                </tr>
                <tr>
                    @if (substr($question->option_e, -3) === 'png' || substr($question->option_e, -3) === 'jpg' || substr($question->option_e, -3) === 'peg')
                    <td class="mb-2" style="display: flex"><input name="pilihan[{{$question->id}}]" type="radio" value="E" style="height:25px; width:25px; vertical-align: middle"> <span class="mx-1"> E.</span>
                    <img src="{{ asset('storage/post-images/' . $question->option_e) }}" alt="" width="400">
                    </td>
                    @else 
                    <td style="display: flex"><input name="pilihan[{{$question->id}}]" type="radio" value="E" style="height:25px; width:25px; vertical-align: middle"> <span class="mx-1"> E.</span>
                    {!!$question->option_e!!}</td>
                    <td> </td>
                    @endif
                </tr>
				</tbody>
    </table>
    @endforeach
    
    <center class="next-button-container">
        @php
        $subtestId = $tryout->id;
        @endphp
        @if($subtestId==1)
            @if ($subtest->id >= 7)
            <button id="next" type="submit" class="btn btn-secondary my-3" onclick="nextSubtest()">Selesai</button>
            @else
                <button id="next" type="submit" class="btn btn-secondary my-3" onclick="nextSubtest()">Selanjutnya</button>
            @endif
        @else
            @if ($subtest->id >= 10)
            <button id="next" type="submit" class="btn btn-secondary my-3" onclick="nextSubtest">Selesai</button>
            @else
                <button id="next" type="submit" class="btn btn-secondary my-3" onclick="nextSubtest()">Selanjutnya</button>
            @endif
        @endif

    </center>
</form>
</div>

<script src="path/to/bootstrap.bundle.min.js"></script>
<script>
    
    function nextSubtest() {
        // submitAnswer();
    // Simpan jawaban atau kemajuan pengguna ke backend (gunakan AJAX jika diperlukan)

    // Pindahkan ke subtes berikutnya
    var currentSubtest = parseInt(getParameterByName('subtest'));
    var nextSubtest = parseInt(currentSubtest) + 1;
    // if (currentSubtest < nextSubtest) {
    window.location.href = "/tryout/{{$tryout->id}}/test?subtest=" + nextSubtest;
    // } else {
    //     alert("Anda tidak dapat kembali ke subtest sebelumnya");
    // }

    // var targetUrl = "/tryout/{{$tryout->id}}/test?subtest=" + nextSubtest;

    // if (nextSubtest > currentSubtest) {
    //     window.location.href = targetUrl;
    //     // Pengguna mencoba mengakses subtest yang berada di bawah currentSubtest
        
    // } else {
    //     // Arahkan ke subtest berikutnya
    //     alert("Anda tidak dapat mengakses subtest sebelumnya.");
    // }

}
function submitForm() {
    var form = document.getElementById("form");
    if (form) {
        form.submit();
    }
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
function submitAnswer() {
        $(document).ready(function () {
        $('input[name^="pilihan"]').on('change', function () {
            var questionId = $(this).closest('tbody').find('input[name="id[]"]').val();
            var selectedOption = $(this).val();

            // Send AJAX request to update the score
            $.ajax({
                url: '/submit-answer', // Replace with the actual endpoint
                type: 'POST',
                data: {
                    questionId: questionId,
                    selectedOption: selectedOption
                },
                success: function (response) {
                    // Handle success response if needed
                    console.log(response);
                },
                error: function (error) {
                    // Handle error response if needed
                    console.error(error);
                }
            });
        });
    });
    }
</script>
</body>
</html>
