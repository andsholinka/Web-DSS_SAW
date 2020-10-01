$(document).ready(function() {
  var data = "tampildatapilihan2.php";
  $("#datapilihan2").load(data);

  $(document).on("click", "#btndetail", function(e) {
    e.preventDefault();
    $("#modal_edit_pilihan").modal("show");
    $.post("tampildetail.php", { id: $(this).attr("data_id") }, function(
      html
      ) {
      $("#data-edit2").html(html);
    });
  });

  $("#form-edit").submit(function(e) {
    e.preventDefault();
    $("#error_edit_id").html("");

    var dataform = $("#form-edit").serialize();
    $.ajax({
      url: "solia.edit.php",
      type: "post",
      data: dataform,
    });
  });
});