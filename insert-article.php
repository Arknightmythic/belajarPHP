<?php

// Load file koneksi ke database
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Deklarasi variabel
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $gambar = $_FILES['gambar'];
  $status = $_POST['status'];
  $nama_file = $_FILES['gambar']['name'];
  // Validasi input
  if (empty($judul) || empty($isi)) {
    echo "Judul dan isi artikel tidak boleh kosong.";
    exit;
  }

  // Jika gambar disertakan, validasi gambar
  if (!empty($gambar)) {
    // Pastikan file gambar memiliki ekstensi yang valid
    $ekstensi_gambar = pathinfo($gambar['name'], PATHINFO_EXTENSION);
    $ekstensi_gambar_valid = array('jpg', 'jpeg', 'png');
    if (!in_array($ekstensi_gambar, $ekstensi_gambar_valid)) {
      echo "Gambar tidak valid.";
      exit;
    }

    // Pastikan ukuran gambar tidak melebihi batas
    $ukuran_gambar = $gambar['size'];
    $batas_ukuran_gambar = 1000000;
    if ($ukuran_gambar > $batas_ukuran_gambar) {
      echo "Ukuran gambar melebihi batas.";
      exit;
    }

    // Pindahkan gambar ke folder penyimpanan
    move_uploaded_file($gambar['tmp_name'], 'img/' . $nama_file);
  } else {
    $nama_file = '';
  }

  // Siapkan query SQL
  $query = "INSERT INTO artikel (judul, isi, gambar, tanggal_buat, tanggal_update, status)
  VALUES ('$judul', '$isi', '$nama_file', CURRENT_DATE, NULL, '$status')";

  // Eksekusi query SQL
  $hasil = mysqli_query($link, $query);

  // Cek hasil eksekusi query
  if ($hasil) {
    // Jika berhasil, tampilkan pesan keberhasilan
    header("location: welcome.php");
  } else {
    // Jika gagal, tampilkan pesan kesalahan
    echo "Gagal menambahkan artikel.";
  }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container my-5 m-auto">
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-md-7 col-lg-8">
              <h4 class="mb-3">Masukkan Mading</h4>
              <form class="needs-validation" novalidate="" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="row g-3">
                  <div class="col-12">
                    <label for="Judul" class="form-label">judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                      Valid Judul is required.
                    </div>
                  </div>
      
                  <div class="col-12">
                    <label for="isi" class="form-label">isi</label>
                    <textarea type="textarea" class="form-control" id="isi" name="isi"  placeholder="tuliskan disini" required="" rows="10"></textarea>
                    <div class="invalid-feedback">
                      masukkan informasi disini.
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="country" class="form-label">status</label>
                    <select class="form-select" id="status" name="status" required="">
                      <option value="">pilih...</option>
                      <option>Draft</option>
                      <option>Publish</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a status.
                    </div>
                  </div>
      
      
                  <div class="col-md-6">
                    <label for="zip" class="form-label">gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="" required="">
                    <div class="invalid-feedback">
                      masukkan gambar.
                    </div>
                  </div>
                </div>
                
                <hr class="my-4">
      
                <button class="w-100 btn btn-primary btn-lg" type="submit">simpan</button>
              </form>
            </div>
          </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>