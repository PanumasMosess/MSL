<?php
    
    require_once("../application.php");
    // date time now 
    $buffer_date = date("Y-m-d");

    $room_type_name_ajax = isset($_POST['room_type_name_ajax']) ? $_POST['room_type_name_ajax'] : '';
    $room_type_id_ajax = isset($_POST['room_type_id_ajax']) ? $_POST['room_type_id_ajax'] : '';

    $sql = "INSERT INTO `room_type`( `room_name`, `room_id`, `date_issue`) 
	VALUES ('$room_type_name_ajax','$room_type_id_ajax', '$buffer_date')";

	if (mysqli_query($db_con, $sql)) {
		echo 'SUCCESS';
	} 
	else {
		echo 'FAILED';
	}
	mysqli_close($db_con);
?>