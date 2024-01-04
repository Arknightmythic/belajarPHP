

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
          <img src="./asset/E-Mading.svg" alt="" height="50" >
        </div>

        <div class="col-md-3 text-end">
          <a href="./welcome.php"><button type="button" class="btn btn-outline-dark me-2">Beranda</button></a>
          <a href="./logout.php"><button type="button" class="btn btn-dark">Logout</button></a>
          
        </div>
  </header>
</div>

<?php
    require_once "config.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM artikel where id_artikel=$id";
    $hasil = mysqli_query($link, $query);
if (isset($hasil)) {
    $data = mysqli_fetch_array($hasil)
?>
    <div class="container my-5 m-auto">
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            <div class="col-md-7 col-lg-8">
              <h4 class="mb-3">Edit Mading</h4>
              <form class="needs-validation" novalidate="" action="edit.php?id=<?php echo $data['id_artikel']; ?>" enctype="multipart/form-data" method="post">
                <div class="row g-3">
                  <div class="col-12">
                    <label for="Judul" class="form-label">judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="" value="<?php echo $data['judul']; ?>" required="">
                    <div class="invalid-feedback">
                      Valid Judul is required.
                    </div>
                  </div>
      
                  <div class="col-12">
                    <label for="isi" class="form-label">isi</label>
                    <textarea type="textarea" class="form-control" id="isi" name="isi"  placeholder="tuliskan disini" required="" rows="10"><?php echo $data['isi']; ?></textarea>
                    <div class="invalid-feedback">
                      masukkan informasi disini.
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="zip" class="form-label">gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="" required="" value="<?php echo $data['gambar']; ?>">
                    <div class="invalid-feedback">
                      masukkan gambar.
                    </div>
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
                
                <hr class="my-4">
      
                <button class="w-100 btn btn-primary btn-lg" type="submit">simpan</button>
              </form>
            </div>
          </div>
    </div>
    <?php
} else {
  echo "Artikel tidak ditemukan.";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>