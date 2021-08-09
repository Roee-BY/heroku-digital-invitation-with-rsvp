<?php
session_start();
?>
<?php
$hostname = "";
$dbname = "";
$username = "";
$pass = "";
// Create connection

$db_conn = pg_connect(" host = $hostname dbname = $dbname user = $username password = $pass port=5432");

if (isset($_POST['un'])) {
    $fname = $_POST['un'];
    $lname = $_POST['pw'];
	$findResult = pg_query($db_conn,"SELECT FROM inv WHERE id=1 AND fn='$fname' AND ln='$lname';");
	if (pg_num_rows($findResult) == 1) 
	{
		$_SESSION["logedin"] = "true";
		include_once("table.php");
		
	}else{
		include_once("retry.html");
	}
}else{
	include_once("signin.html");
}
?>