<?php

// Load file koneksi ke database
require_once "config.php";

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

?>

