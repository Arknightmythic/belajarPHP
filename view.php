<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php

        /// Load file koneksi ke database
        require_once "config.php";

        // Deklarasi variabel

        // Siapkan query SQL
        $query = "SELECT * FROM artikel";
        $hasil = mysqli_query($link, $query);

        // Cek hasil eksekusi query
        if ($hasil) {
          // Jika berhasil, tampilkan data artikel
          while ($data = mysqli_fetch_array($hasil)) {
            // Tampilkan gambar artikel
            if ($data['gambar'] != '') {
              echo              '<div class="col">';
              echo                '<div class="card shadow-sm">';
              echo                '<img class="bd-placeholder-img card-img-top" src="img/' . $data['gambar'] . '" width="100%" height="225" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>';
              echo                 '<div class="card-body">';
              echo                    "<h2>" . $data['judul'] . "</h2>";
              echo                    '<p class="card-text">' . $data['isi'] . '</p>';
              echo                    '<div class="d-flex justify-content-between align-items-center">';
              echo                      '<div class="btn-group">';
              echo                        '<button type="button" class="btn btn-sm btn-outline-secondary">View</button>';
              echo                        '<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>';
              echo                      '</div>';
              echo                      '<small class="text-body-secondary">9 mins</small>';
              echo                    '</div>';
              echo                  '</div>';
              echo                '</div>';
              echo              '</div>';
            }
            
            
          }

        } else {
          // Jika gagal, tampilkan pesan kesalahan
          echo "Gagal menampilkan isi mading.";
        }
        ?>
      


      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
