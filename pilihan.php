<?php

include("_header.php"); 
require 'functions.php';

?>

<?php 

if (isset($_POST["hapus"])) {

  if (hapus($_POST) > 0) {
    echo "<script>
    document.location.href = 'pilihan.php';
    </script>";
  } else {
    echo "<script>
    document.location.href = 'pilihan.php';
    </script>";
    echo mysqli_error($koneksi);
  }
}

?>

<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
      <h3 class="text-themecolor m-b-0 m-t-0">Data Keluarga Miskin</h3>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Data Keluarga</li>
      </ol>
    </div>
  </div>
  <!-- Start Page Content -->


  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-block">
          <h4 class="card-title">Data Keluarga Miskin
            <button type="button" class="btn waves-effect waves-light btn-info btn-sm pull-right addbtn1" data-toggle="modal" data-target="#pilihanddmodal">
              <i class="mdi mdi-plus-circle"></i> Import Data
            </button>
            <p></p>
            <form action="" method="POST">
            <button type="submit" class="btn waves-effect waves-light btn-danger btn-sm pull-right" name="hapus" onclick="return confirm('Yakin ingin menghapus seluruh data?')">
              <i class="mdi mdi-minus-circle"></i> Delete Data
            </button>              
            </form>

          </h4>
          <div class="table-responsive">
            <!--panggil file-->
            <div id="datapilihan2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Pilihan Modal -->
  <div class="modal fade" id="pilihanddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="solia.add.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            
            <div class="form-group">
              <label for="file"></label>
              <input type="file" name="file" id="file" accept=".xls,.xlsx" class="form-control" required autocomplete="off">
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" name="import2" value="Import2" class="btn btn-success">Import Data</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- MODAL UNTUK EDIT (pilihan) -->
  <div id="modal_edit_pilihan" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title-bold">Detail Solia</h4>
          <div align="right">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        </div>
        <div class="modal-body">
          <!-- panggil isi ( scriptedit ) -->
          <div id="data-edit2"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Logout Modal-->
</div>

<?php include("_footer.php"); ?>