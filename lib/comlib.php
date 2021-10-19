<?php
/**********************************************************************************/
/*conn db *************************************************************************/
//error reporting
//open
ini_set('display_errors', 1);
error_reporting(~0);

set_time_limit(1200);

/**********************************************************************************/
/*connect to the database *********************************************************/ 
//connect to the database $dbname on $dbhost with the user/password pair
//"CharacterSet" =>'UTF-8' for support thai lang
//set var to array (var must be string type)
$db_con = mysqli_connect($CFG->dbhost,$CFG->dbuser,$CFG->dbpass,$CFG->dbname);
mysqli_set_charset($db_con, "utf8");

if($db_con === false)
{
	echo "Connection could not be established. <br/>";
    die( print_r($db_con->connect_error));
}

?>