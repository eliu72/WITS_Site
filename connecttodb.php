
<?php
//$dbhost = "localhost";
//$dbuser = "root";
//$dbpass = "purplesky";
//$dbname = "wits";
//$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//if (mysqli_connect_errno()) {
//        die("Database connection failed :" .
//        mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
//} //end of if statement
//

// database connection information 
$server = "127.0.0.1"; 
$user = "root"; 
$password = "purplesky";
$database = "wits";

/* error messages */
$messErr_connectionDatabaseFailed = "Error : connection failed. Please try later.";

$connection = new mysqli($server, $user, $password, $database);

/* If connection failed */
if (!$connection) {
    printf($messErr_connectionDatabaseFailed);
    printf("<br />");
}
/* If connection successed */
else {
    /* everything is ok, go to next part of you algorithm */
}
?>
