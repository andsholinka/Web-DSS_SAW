<?php include("_header.php"); 

require 'functions.php';
$result = query("SELECT COUNT(id_pilihan) as jumlah FROM pilihan ");
?>

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    Selamat datang di aplikasi SPK Ketimbang Ngemis Yogyakarta
                </div>
            </div>
            <?php foreach ( $result as $data ) : 

                if ($data['jumlah'] == 0):?>

                <div class="col-2">                       
                    <div class="panel panel-primary text-center no-boder bg-color-red">
                        <div class="panel-body">
                        <i class="fa fa-edit fa-5x"></i>
                        <h3>Tidak Ada Data Keluarga</h3>
                        </div>
                       <!--  <div class="panel-footer back-footer-red">Total Keluarga</div> -->
                    </div>                         
                </div>
                 <?php endif;  ?>
                 <?php
                 if ($data['jumlah'] > 0):?>

                 <div class="col-2">                       
                     <div class="panel panel-primary text-center no-boder bg-color-red">
                      <div class="panel-body">
                        <i class="fa fa-edit fa-5x"></i>
                        <h3><?php echo $data['jumlah']; ?> Keluarga </h3>
                    </div>
                    <div class="panel-footer back-footer-red">
                        Total Keluarga
                    </div>
                </div>                         
            </div>
            <?php endif; 
         endforeach ?>             
    </div>
</div>
</div>

<?php include("_footer.php"); ?>