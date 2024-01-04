<?php

// Load file koneksi ke database
require_once "config.php";

// Cek apakah ada id artikel yang dikirimkan
if (!isset($_GET['id'])) {
  // Jika tidak ada, arahkan ke halaman index
  header("Location: welcome.php");
  exit;
}

// Deklarasi variabel
$id = $_GET['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$gambar = $_FILES['gambar'];
$status = $_POST['status'];
$nama_file = $_FILES['gambar']['name'];
$tanggal_update = date("Y-m-d H:i:s");

// Query data artikel
$query = "SELECT * FROM artikel WHERE id_artikel = $id";
$hasil = mysqli_query($link, $query);

// Cek hasil eksekusi query
if ($hasil) {
  // Jika berhasil, ambil data artikel
  $data_artikel = mysqli_fetch_assoc($hasil);
} else {
  // Jika gagal, tampilkan pesan kesalahan
  echo "Gagal mengambil data artikel.";
}


// Validasi input
if (empty($judul) || empty($isi)) {
    echo "Judul dan isi artikel tidak boleh kosong.";
    exit;
  }
  
  // Jika gambar disertakan, validasi gambar
  if ($_FILES["gambar"]["error"] == 0) {
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
    $nama_file = $data_artikel['gambar'];
  }
  
  // Siapkan query SQL
  $query = "UPDATE artikel SET
  judul = '$_POST[judul]',
  isi = '$_POST[isi]',
  gambar = '$nama_file',
  tanggal_update = '$tanggal_update',
  status = '$status'
  WHERE id_artikel = $id";
  
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