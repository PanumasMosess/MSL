(function ($) {
  //  "use strict";

  $(document).ready(function () {
    var table_tast = $("#data-table-basic").DataTable();

    $("#data-table-basic tbody").on("click", "tr", function () {
      var data = table_tast.row(this).data();
      alert("Position : " + data[1] + " ");
    });

  });
})(jQuery);
