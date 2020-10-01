<?php

include("_header.php");
require 'functions.php';

$sql = query("SELECT nama_solia, alamat, 
    kriteria_usaha.bobot_kriteria AS B5,
    kriteria_jml_tanggungan.bobot_kriteria AS B1,
    kriteria_tempat_tinggal.bobot_kriteria AS B2, 
    kriteria_lantai.bobot_kriteria AS B3,
    kriteria_dinding.bobot_kriteria AS B4 FROM pilihan
    INNER JOIN kriteria_usaha ON pilihan.C5 = kriteria_usaha.id_kriteria
    INNER JOIN kriteria_jml_tanggungan ON pilihan.C1 = kriteria_jml_tanggungan.id_kriteria
    INNER JOIN kriteria_tempat_tinggal ON pilihan.C2 = kriteria_tempat_tinggal.id_kriteria
    INNER JOIN kriteria_lantai ON pilihan.C3 = kriteria_lantai.id_kriteria
    INNER JOIN kriteria_dinding ON pilihan.C4 = kriteria_dinding.id_kriteria

    ");

$sql_max = query("SELECT MAX(kriteria_usaha.bobot_kriteria) AS M5,
    MAX(kriteria_jml_tanggungan.bobot_kriteria) AS M1, 
    MAX(kriteria_tempat_tinggal.bobot_kriteria) AS M2,
    MAX(kriteria_lantai.bobot_kriteria) AS M3,
    MAX(kriteria_dinding.bobot_kriteria) AS M4 FROM pilihan
    INNER JOIN kriteria_usaha ON pilihan.C5 = kriteria_usaha.id_kriteria
    INNER JOIN kriteria_jml_tanggungan ON pilihan.C1 = kriteria_jml_tanggungan.id_kriteria
    INNER JOIN kriteria_tempat_tinggal ON pilihan.C2 = kriteria_tempat_tinggal.id_kriteria
    INNER JOIN kriteria_lantai ON pilihan.C3 = kriteria_lantai.id_kriteria
    INNER JOIN kriteria_dinding ON pilihan.C4 = kriteria_dinding.id_kriteria
    ");

?>

    <!-- <link href="lite/DataTables/datatables.min.css" rel="stylesheet"> -->
    <script src="lite/DataTables/datatables.min.js"></script>

    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Hasil</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Hasil</li>
                </ol>
            </div>
        </div>
        <!-- Start Page Content -->

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="display:none" >
                    <div class="card-block">
                     <!--  <h4 class="card-title">Rating Kecocokan</h4> -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="btn-info">
                                    <th>Alternatif</th>
                                    <th>C1</th>
                                    <th>C2</th>
                                    <th>C3</th>
                                    <th>C4</th>
                                    <th>C5</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ( $sql as $row ) : ?>
                                    <tr>
                                        <td><?=$row['nama_solia']?></td>
                                        <td><?=$row['B1']?></td>
                                        <td><?=$row['B2']?></td>
                                        <td><?=$row['B3']?></td>
                                        <td><?=$row['B4']?></td>
                                        <td><?=$row['B5']?></td>
                                    </tr>
                                    
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <?php foreach ( $sql_max as $data_max ) : ?>                     
                                    <tr>
                                        <td>Nilai Max</td>
                                        <td><?=$data_max['M1']?></td>
                                        <td><?=$data_max['M2']?></td>
                                        <td><?=$data_max['M3']?></td>
                                        <td><?=$data_max['M4']?></td>
                                        <td><?=$data_max['M5']?></td>
                                    </tr>
                                <?php endforeach ?>
                                <tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="display:none">
                        <div class="card-block">
                            <h4 class="card-title">Hasil Perhitungan Normalisasi ( Rating Kecocokan : Nilai Max )</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="btn-warning">
                                            <th>Alternatif</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>C5</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ( $sql as $row ) : ?>
                                            <tr>
                                                <td width="30%"><?=$row['nama_solia']?></td>
                                                <td><?=$row['B1'] / $data_max['M1']?></td>
                                                <td><?=$row['B2'] / $data_max['M2']?></td>
                                                <td><?=$row['B3'] / $data_max['M3']?></td>
                                                <td><?=$row['B4'] / $data_max['M4']?></td>
                                                <td><?=$row['B5'] / $data_max['M5']?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Nilai Ranking</h4>
                            <div class="table-responsive">
                                <table class="display nowrap table table-hover table-striped table-bordered" id="datatables-1">
                                    <thead>
                                        <tr class="btn-success">                                
                                            <th>Nama Kepala Keluarga</th>
                                            <th>Nilai</th>
                                            <th style="display:none">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $bobot_w = array('c1' => 0.27, 'c2' => 0.23, 'c3' => 0.15, 'c4' => 0.15, 'c5' => 0.20);
                                        ?>

                                        <?php foreach ( $sql as $data ) : {

                                            $nilai = 
                                            ($bobot_w['c1']*($data['B1']/ $data_max['M1'])) +
                                            ($bobot_w['c2']*($data['B2']/ $data_max['M2'])) +
                                            ($bobot_w['c3']*($data['B3']/ $data_max['M3'])) +
                                            ($bobot_w['c4']*($data['B4']/ $data_max['M4'])) +
                                            ($bobot_w['c5']*($data['B5']/ $data_max['M5']))
                                            ;
                                            
                                            ?>
                                            <tr>
                                                <td><?=$data['nama_solia']?></td>
                                                <td class="id"><?=$nilai?></td>
                                                <td style="display:none"><?=$data['alamat']?></td>
                                            </tr>
                                            <?php } ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
    </div>

<script>
    $(document).ready(function() {
        $('#datatables-1').DataTable({
            "order": [1, "desc"],
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false,
            "paging": true,
            dom: 'Bfrtip',
            buttons: [
            'excel'
            ]
        });
    })

</script>

<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->


<?php include("_footer.php"); ?>