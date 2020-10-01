$(document).ready(function() {
  var data = "tampildatasolia.php";
  $("#datasolia").load(data);

  $(document).on("click", "#btnedit", function(e) {
    e.preventDefault();
    $("#modal_edit").modal("show");
    $.post("solia.edit.modal.php", { id: $(this).attr("data_id") }, function(
      html
      ) {
      $("#data-edit").html(html);
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