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
</head>
<body>
    <p id="timer" align="right" class="text-light p-3 bg-dark fixed-top">Sisa Waktu: 00:29:56</p>	
    <br><br><br>
    <center>
        <h5 class="mb-3">{{ $subtest->subtes }} </h5>
    </center>
    <form action="/tryout/{{$tryout->id}}/test" method="post">
        @csrf
    @foreach($questions as $question)
    <table border="0" class="m-3 p-2 bg-warning d-flex rounded">
        <tbody>   
                <input type="hidden" name="id[]" value="{{$question->id}}">
                <input type="hidden" name="id_subtes" value="{{$subtest->id}}">
                <tr>
                    <td align="justify">{{ $loop->iteration }}. {{$question->question}}</td>
                    <td> </td>
                </tr>
                <tr>
                    <td><input name="pilihan[{{$question->id}}]" type="radio" value="A" style="height:25px; width:25px; vertical-align: middle"> A. {{$question->option_a}}</td>
                    <td> </td>
                </tr>
                <tr>
                    <td><input name="pilihan[{{$question->id}}]" type="radio" value="B" style="height:25px; width:25px; vertical-align: middle"> B. {{$question->option_b}}</td>
                    <td> </td>
                </tr>
                <tr>
                    <td><input name="pilihan[{{$question->id}}]" type="radio" value="C" style="height:25px; width:25px; vertical-align: middle"> C. {{$question->option_c}}</td>
                    <td> </td>
                </tr>
                <tr>
                    <td><input name="pilihan[{{$question->id}}]" type="radio" value="D" style="height:25px; width:25px; vertical-align: middle"> D. {{$question->option_d}}</td>
                    <td> </td>
                </tr>
                <tr>
                    <td><input name="pilihan[{{$question->id}}]" type="radio" value="E" style="height:25px; width:25px; vertical-align: middle"> E. {{$question->option_e}}</td>
                    <td> </td>
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
            <button type="submit" class="btn btn-secondary mt-3">Selesai</button>
            @else
                <button type="submit" class="btn btn-secondary mt-3" onclick="nextSubtest()">Selanjutnya</button>
            @endif
        @else
            @if ($subtest->id >= 10)
            <button type="submit" class="btn btn-secondary mt-3">Selesai</button>
            @else
                <button type="submit" class="btn btn-secondary mt-3" onclick="nextSubtest()">Selanjutnya</button>
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
    var currentSubtest = getParameterByName('subtest');
    var nextSubtest = parseInt(currentSubtest) + 1;
    window.location.href = "/tryout/{{$tryout->id}}/test?subtest=" + nextSubtest;
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
