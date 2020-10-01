 <?php

 include"functions.php";
 // $view = mysqli_query($koneksi, "select * from pilihan where id_pilihan= $_POST[id]");

 $view = mysqli_query($koneksi, "SELECT nama_solia, alamat,
  kriteria_usaha.pilihan_kriteria AS B5,
  kriteria_jml_tanggungan.pilihan_kriteria AS B1,
  kriteria_tempat_tinggal.pilihan_kriteria AS B2, 
  kriteria_lantai.pilihan_kriteria AS B3,
  kriteria_dinding.pilihan_kriteria AS B4 FROM pilihan 
  INNER JOIN kriteria_usaha ON pilihan.C5 = kriteria_usaha.id_kriteria
  INNER JOIN kriteria_jml_tanggungan ON pilihan.C1 = kriteria_jml_tanggungan.id_kriteria
  INNER JOIN kriteria_tempat_tinggal ON pilihan.C2 = kriteria_tempat_tinggal.id_kriteria
  INNER JOIN kriteria_lantai ON pilihan.C3 = kriteria_lantai.id_kriteria
  INNER JOIN kriteria_dinding ON pilihan.C4 = kriteria_dinding.id_kriteria
  where id_pilihan= $_POST[id]
  ");

 if (!$view) {
  printf("Error: %s\n", mysqli_error($koneksi));
  exit();
}
$user_data = mysqli_fetch_array($view);

?>

<form method="POST" role="form">

  <?php $data = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_pilihan = '$_POST[id]' ") ?>

  <div class="form-group">
    <label>Nama Kepala Keluarga</label>
    <input name="nama_solia" class="form-control"  value="<?php echo $user_data['nama_solia'] ; ?>" readonly />                                
  </div>

  <div class="form-group">
    <label>Jumlah Anggota Keluarga (C1)</label>
    <input name="nama_solia" class="form-control"  value="<?php echo $user_data['B1'] ; ?>" readonly />                                
  </div>

  <div class="form-group">
    <label>Tempat Tinggal (C2)</label>
    <input name="nama_solia" class="form-control"  value="<?php echo $user_data['B2'] ; ?>" readonly />                                
  </div>

  <div class="form-group">
    <label>Jenis Lantai (C3)</label>
    <input name="nama_solia" class="form-control"  value="<?php echo $user_data['B3'] ; ?>" readonly />                                
  </div>

  <div class="form-group">
    <label>Jenis Dinding (C4)</label>
    <input name="nama_solia" class="form-control"  value="<?php echo $user_data['B4'] ; ?>" readonly />                                
  </div>

  <div class="form-group">
    <label>Kepemilikan Usaha (C5)</label>
    <input name="nama_solia" class="form-control"  value="<?php echo $user_data['B5'] ; ?>" readonly />                                
  </div>

  <div class="form-group">
    <label>Alamat</label>
    <input name="alamat" class="form-control"  value="<?php echo $user_data['alamat'] ; ?>" readonly >    
  </div>
  
</form>