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

// Siapkan query SQL
$query = "DELETE FROM artikel WHERE id_artikel = $id";

// Eksekusi query SQL
$hasil = mysqli_query($link, $query);

// Cek hasil eksekusi query
if ($hasil) {
  // Jika berhasil, arahkan ke halaman index
  header("Location: welcome.php");
} else {
  // Jika gagal, tampilkan pesan kesalahan
  echo "Gagal menghapus artikel.";
}

?>