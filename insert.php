<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="tambah-artikel.php"
 
 method="post"
  
 enctype="multipart/form-data">
 
   
 <div
  
 class="form-group">
 
     
 <label
  
 for="judul">Judul</label>
 
     
 <input
  
 type="text"
  
 class="form-control"
  
 id="judul"
  
 name="judul"
  
 placeholder="Masukkan judul artikel">
 
   
 </div>
 
   
 <div
  
 class="form-group">
 
     
 <label
  
 for="isi">Isi</label>
     <textarea class="form-control" id="isi" name="isi" rows="10"
  
 placeholder="Masukkan isi artikel"></textarea>
 
   
 </div>
 
   
 <div
  
 class="form-group">
 
     
 <label
  
 for="gambar">Gambar</label>
 
     
 <input
  
 type="file"
  
 class="form-control-file"
  
 id="gambar"
  
 name="gambar">
 
   
 </div>
 
   
 <div
  
 class="form-group">
 
     
 <label
  
 for="status">Status</label>
     <select class="form-control" id="status" name="status">
 
       
 <option
  
 value="draft">Draft</option>
 
       
 <option
  
 value="publish">Publish</option>
 
     
 </select>
 
   
 </div>
 
   
 <button
  
 type="submit"
  
 class="btn btn-primary">Tambah</button>
 </form>
</body>
</html>