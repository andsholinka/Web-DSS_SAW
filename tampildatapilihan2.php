<?php  

require 'functions.php';
$pilihan = query("SELECT * FROM pilihan");

?>

<!--   <link href="lite/DataTables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->

<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/colors/blue.css" id="theme" rel="stylesheet">

<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr class="btn-danger">
            <th>No</th>
            <th>Alternatif</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th width="15%">
                <i class="mdi mdi-settings"></i>
            </th>
        </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach ( $pilihan as $row ) : ?>
          <tr>
            <td><?= $i ?></td>
            <td><?= $row["nama_solia"]; ?></td>
            <td><?= $row["C1"]; ?></td>
            <td><?= $row["C2"]; ?></td>
            <td><?= $row["C3"]; ?></td>
            <td><?= $row["C4"]; ?></td>
            <td><?= $row["C5"]; ?></td>
            <td>

                <button type="button" class="btn waves-effect waves-light btn-warning btn-sm" id="btndetail" data_id=<?php echo $row['id_pilihan']?>>
                  <i class="mdi mdi-pencil-circle"></i> Detail Data
              </button>
        </td>
    </tr>
    <?php $i++  ?>
<?php endforeach ?>
</tbody>
</table>

<!-- <script src="lite/js/datatables-demo.js"></script>
<script src="lite/js/jquery.dataTables.min.js"></script>
<script src="lite/js/dataTables.bootstrap4.min.js"></script>
<script src="lite/js/datatables-demo.js"></script> -->

<!-- This is data table -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>