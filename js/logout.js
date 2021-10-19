function logout_cc() {
  swal({
    title: "Are you sure ?",
    text: "You want to Logout !",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "Cancel",
  }).then(
    function (isConfirm) {
      if (isConfirm) {
        $.ajax({
          type: "POST",
          url: "/knowledge_bank/src/auth/logout.php",
          data: {
            user_ajax: "USER",
            name_en_ajax: "USER",
          },
          success: function (response) {
            if (response == "SUCCESS_LOOUT") {
              window.location.href = "index.php";
            }
          },
          error: function () {
            //dialog ctrl
            swal({
              title: "Warning !",
              text: "[D002] --- Ajax Error ไม่สามารถออกจากระบบได้ (ติดต่อ Admin) !!! ",
              type: "warning",
              timer: 3000,
              showConfirmButton: false,
              allowOutsideClick: false,
            });
          },
        });
      }
    },
    function (dismiss) {
      if (dismiss === "cancel" || dismiss === "close") {
        // ignore
      }
    }
  );
}
