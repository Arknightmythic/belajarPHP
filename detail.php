<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detailt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
          <img src="./asset/E-Mading.svg" alt="" height="50" >
        </div>

        <div class="col-md-3 text-end">
          <a href="./welcomeview.php"><button type="button" class="btn btn-outline-dark me-2">Beranda</button></a>
          <a href="./logout.php"><button type="button" class="btn btn-dark">Logout</button></a>
          
        </div>
  </header>
</div>
<?php

    /// Load file koneksi ke database
    require_once "config.php";

    // Deklarasi variabel
    $id = $_GET['id'];
    // Siapkan query SQL
    $query = "SELECT * FROM artikel where id_artikel=$id";
    $hasil = mysqli_query($link, $query);
    $data = mysqli_fetch_array($hasil);

    echo    '<div class="px-4 pt-5 mb-5 mt-2 text-center border-bottom">';
    echo        '<h1 class="display-4 fw-bold text-body-emphasis">'.$data["judul"].'</h1>';
    echo        '<div class="col-lg-6 mx-auto">';
    echo            '<p class="lead mb-4">'.$data["isi"].'</p>';
    echo        '</div>';
    echo        '<div class="overflow";">';
    echo            '<div class="container px-5">';
    echo                '<img src="img/' . $data['gambar'] . '" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" loading="lazy">';
    echo            '</div>';
    echo        '</div>';
    echo    '</div>';
  
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
