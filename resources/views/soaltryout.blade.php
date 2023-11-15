<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <link href="review_to.css" rel="stylesheet">
    <title>Review Tryout</title>
    <style>
        * {
    font-family: "Poppins", sans-serif;
}

h1{
    font-size: 20px;
    text-align: center;
    margin-top: 20px;
    font-family: sans-serif;
}
.scrollable-y {
    overflow-y: auto;
    max-height: 100px; 
}

.card{
    width: 98%;
    height: 98%;
    background-color: rgb(242, 202, 40);
    border-radius: 10px;
    padding: 5px;
    margin-left: 10px;
    margin-top: 10px;
}
.form-check{
   margin-left: 15px;
   padding: 5px;
   margin-top: 0px;
}
.card-title{
    margin-left: 5px;
    font-size: 18px;
    margin-bottom: 0px;
}
.next-button-container {
    display: flex;
    justify-content: center;
    margin-top: 20px; 
}

.next-button-container button {
    background-color: #ccc; 
    font-size: 18px;
    border-radius: 20px;
}
    </style>
</head>
<!-- <div class="card-body scrollable-y">  -->
<body>
    <h1> Nama subtes pertama </h1>
<div class="container mt-2">
    <div class="card">
            <h5 class="card-title">1. Pertanyaan nomor satu................</h5>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="answer1" id="optionA1" value="A">
                <label class="form-check-label" for="optionA1">A. Pilihan A</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="answer1" id="optionB1" value="B">
                <label class="form-check-label" for="optionB1">B. Pilihan B</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="answer1" id="optionC1" value="C">
                <label class="form-check-label" for="optionC1">C. Pilihan C</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="answer1" id="optionD1" value="D">
                <label class="form-check-label" for="optionD1">D. Pilihan D</label>
            </div>
    </div>
    <div class="card">
        <h5 class="card-title">2. Pertanyaan nomor dua................</h5>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="answer1" id="optionA1" value="A">
            <label class="form-check-label" for="optionA1">A. Pilihan A</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="answer1" id="optionB1" value="B">
            <label class="form-check-label" for="optionB1">B. Pilihan B</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="answer1" id="optionC1" value="C">
            <label class="form-check-label" for="optionC1">C. Pilihan C</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="answer1" id="optionD1" value="D">
            <label class="form-check-label" for="optionD1">D. Pilihan D</label>
        </div>
    </div>
    
    <div class="next-button-container">
        <button type="submit" class="btn btn-primary mt-3">Selanjutnya</button>
    </div>
</div>

<script src="path/to/bootstrap.bundle.min.js"></script>
</body>
</html>
