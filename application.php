<?

//default Asia/Bangkok
date_default_timezone_set('Asia/Bangkok');

$CFG = new stdClass;

//DB Connect
$CFG->dbhost = "remotemysql.com";
$CFG->dbhostPing = "remotemysql.com";
$CFG->dbname = "TAwnZWMjp9";
$CFG->dbuser = "TAwnZWMjp9";
$CFG->dbpass = "2c7QlRDib3";

$CFG->libdir = "lib";
$CFG->wwwroot_other = "/MSL"; 
$CFG->wwwroot = "/MSL";


/**********************************************************************************/
/*standard libraries **************************************************************/
require_once("$CFG->libdir/comlib.php");

/**********************************************************************************/
/*config path file  ***************************************************************/

//src_file
$CFG->src_main = "$CFG->wwwroot";
$CFG->src = "$CFG->wwwroot/src";

?>