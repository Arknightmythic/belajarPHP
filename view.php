<?php

// Load file koneksi ke database
require_once "config.php";

// Deklarasi variabel

// Siapkan query SQL
$query = "SELECT * FROM artikel";
$hasil = mysqli_query($link, $query);

// Cek hasil eksekusi query
if ($hasil) {
  // Jika berhasil, tampilkan data artikel
  $data = mysqli_fetch_assoc($hasil);

  // Tampilkan judul artikel
  echo "<h2>" . $data['judul'] . "</h2>";

  // Tampilkan isi artikel
  echo "<p>" . $data['isi'] . "</p>";

  // Tampilkan gambar artikel
  if ($data['gambar'] != '') {
    $gambar = mysqli_fetch_blob($hasil);
    echo "<img src='data:image/jpeg;base64," . base64_encode($gambar) . "' alt=''>";
  }
  
} else {
  // Jika gagal, tampilkan pesan kesalahan
  echo "Gagal menampilkan isi mading.";
}



?>