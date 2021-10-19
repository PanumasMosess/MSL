<?php
      
  require_once("../application.php");
      
   $strSql = "SELECT * FROM room_type";
  
  $objQuery = mysqli_query($db_con, $strSql);
  
  $row_id = 0;
  $json = array();
  while($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC))
  {
      $row_id++;
      $inround__ = array(
          "no" => $row_id,
          "room_name" => $objResult['room_name'],
          "room_id" => $objResult['room_id'],
          "date_issue" => $objResult['date_issue']
      );
      array_push($json, $inround__);
  
  }
          
      echo json_encode($json);
?>
