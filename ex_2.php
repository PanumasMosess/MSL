<?php
require_once("application.php");
?>

<!DOCTYPE html>
<html lang="en">


<?php
require_once("js_css_header.php");
?>

<body>
    <!-- Breadcomb area Start-->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <a href="index.php"> <i class="fa fa-home"></i></a>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Room Type</h2>
                                        <p>Room Type for test</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->
    <!-- Form Element area Start-->
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list mg-t-30">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" data-live-search="true" id="select_dept" name="select_dept">
                                            <option value="" style="color: #999;" selected>Selected Room Type...</option>
                                            <?php
                                            $strSQL_room_type = "SELECT room_name FROM room_type group by room_name";
                                            $objQuery_room_type = mysqli_query($db_con, $strSQL_room_type) or die("Error Query [" . $strSQL_room_type . "]");
                                            while ($objResult_room_type = mysqli_fetch_array($objQuery_room_type, MYSQLI_ASSOC)) {
                                            ?>
                                                <option value="<?= $objResult_room_type["room_name"]; ?>"><?= $objResult_room_type["room_name"]; ?></option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_room">
                                        <div class="input-group date nk-int-st">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" id="year_picker" placeholder="select date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <button class="btn btn-primary btn-sm hec-button waves-effect" onclick="_onget()" type="button">Get Room Detail</button>
                                <a href="index.php" class="btn btn-success btn-sm hec-button waves-effect"  type="button">To Index Page</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="invoice-sp">
                                    <table class="table table-hover" id="room_table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Room Date</th>
                                                <th>Room Left</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>

    <!-- bootstrap JS
		============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>

    <!-- bootstrap select JS
		============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>

    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            _load_room_type();
        });

        function _load_room_type() {
            $.ajax({

                url: "http://34.87.142.215/aspire-project/public/booking-box/api-test",
                success: function(data) {
                    console.log(data);
                    var result = JSON.parse(data);
                    callinTable(result);
                }
            });


            // function callinTable(data) {
            //     var table = $("#room_detail").DataTable({
            //         "bDestroy": true,
            //         columnDefs: [{
            //                 orderable: true,
            //                 className: 'reorder',
            //                 targets: [1, 2, 3]
            //             },
            //             {
            //                 orderable: false,
            //                 targets: '_all'
            //             }
            //         ],
            //         responsive: true,
            //         autoFill: true,
            //         colReorder: true,
            //         keys: true,
            //         select: true,
            //         processing: true,
            //         serverside: true,
            //         data: data,
            //         columns: [{
            //                 data: 'no'
            //             },
            //             {
            //                 data: 'room_name'
            //             },
            //             {
            //                 data: 'room_id'
            //             },
            //             {
            //                 data: 'date_issue'
            //             }
            //         ]
            //     });

            // }
        }

        function _ongetApi() {
            $.ajax({
                type: 'POST',
                url: '<?= $CFG->src; ?>/save_room_type.php',
                data: {
                    room_type_name_ajax: $("#type_name").val(),
                    room_type_id_ajax: $("#type_id").val(),
                },
                success: function(response) {

                    if (response == 'SUCCESS') {
                        alert('SAVE SUCCESS');
                        _load_room_type();
                        $("#type_name").val('');
                        $("#type_id").val('');
                    } else if (response == 'FAILED') {
                        alert('SAVE FAILED');
                        _load_room_type();
                    }

                },
                error: function() {
                    //dialog ctrl
                    alert('Network Err')
                }
            });
        }
    </script>
</body>

</html>