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
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <img src="./asset/E-Mading.svg" alt="" height="50" >
      </div>

      <div class="col-md-3 text-end">
        <a href="./logout.php"><button type="button" class="btn btn-dark">Logout</button></a>
        
      </div>
    </header>
  </div>
  <div class="text-center">
    <h3 class="mt-5 mb-0 my-auto">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. berikut informasi terkini</h3>
    
  </div>
    
    <div class="album py-5">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php

        /// Load file koneksi ke database
        require_once "config.php";

        // Deklarasi variabel

        // Siapkan query SQL
        $query = "SELECT * FROM artikel WHERE status = 'Publish'";
        $hasil = mysqli_query($link, $query);

        // Cek hasil eksekusi query
        if ($hasil) {
          // Jika berhasil, tampilkan data artikel
          while ($data = mysqli_fetch_array($hasil)) {
            if(empty($data['tanggal_update']) && is_null($data['tanggal_update'])){
              $waktu=$data['tanggal_buat'];
            }else{
              $waktu=$data['tanggal_update'];
            }
            // Tampilkan gambar artikel
            if ($data['gambar'] != '') {
              echo              '<div class="col">';
              echo                '<div class="card shadow-sm">';
              echo                '<img class="bd-placeholder-img card-img-top" src="img/' . $data['gambar'] . '" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>';
              echo                 '<div class="card-body h-50">';
              echo                    "<h2>" . $data['judul'] . "</h2>";
              echo                    '<p class="card-text">' . substr($data['isi'], 0, 150) . '...' . '</p>';
              echo                    '<div class="d-flex justify-content-between align-items-center">';
              echo                      '<div class="btn-group">';
              echo                        '<a href="detail.php?id='. $data['id_artikel'].'"><button type="button" class="btn btn-sm btn-outline-secondary">Detail</button></a>';
              echo                      '</div>';
              echo                      '<small class="text-body-secondary">'.$waktu.'</small>';
              echo                    '</div>';
              echo                  '</div>';
              echo                '</div>';
              echo              '</div>';
            }
            
            
          }

        } else {
          // Jika gagal, tampilkan pesan kesalahan
          echo '<h5 class="mt-5 mb-0 my-auto">Tidak ada artikel disini.</h5>';
        }
        ?>
      


      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>