<?php
$hostname = "";
$dbname = "";
$username = "";
$pass = "";

// Create connection
$db_conn = pg_connect(" host = $hostname dbname = $dbname user = $username password = $pass port=5432");

if (isset($_POST['phone'])) {
    $fname = $_POST['fn'];
    $lname = $_POST['ln'];
	$num = $_POST['num'];
    $phone = $_POST['phone'];
	$findResult = pg_query($db_conn,"SELECT FROM inv WHERE phone ='$phone';");
	if (pg_num_rows($findResult) == 1) 
	{
		$query = pg_query($db_conn, "UPDATE inv SET fn='$fname', ln='$lname', amount=$num WHERE phone='$phone';");
		if ( $query ) {
			include_once("updated.html");
		}
	}else{
		$query = pg_query($db_conn, "INSERT  INTO inv(fn, ln,phone,amount) VALUES ('$fname','$lname','$phone','$num');");
		if ( $query ) {
			include_once("added.html");
		}
	}
}
?>