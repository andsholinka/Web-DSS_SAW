<?php  

  // koneksi ke database
$koneksi = mysqli_connect("localhost","root","","spk-kny-new");


function query($query) {
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function hapus($query) {
      global $koneksi;
      mysqli_query($koneksi, "TRUNCATE TABLE pilihan");

      return mysqli_affected_rows($koneksi);
}


?>