<?php

if($_SESSION["logedin"]=="true")
{

$hostname = "ec2-54-228-99-58.eu-west-1.compute.amazonaws.com";
$dbname = "dep1c8q2hc89dj";
$username = "eimfdocfoqqorx";
$pass = "4d987a877756400f56006d371b6bcda52db190c9e33e05e658e5c2941a512861";

// Create connection
$link = pg_connect(" host = $hostname dbname = $dbname user = $username password = $pass port=5432");
if (!$link)
{
	die('Error: Could not connect: ' . pg_last_error());
}


$query = 'select * from inv';

$result = pg_query($query);

$i = 0;
echo '<html>
<head>
<meta charset="utf-8">
<title>הזמנה לבר המצווה של דביר</title>
<link rel="shortcut icon" href="images/title2.png"></link>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:title" content="website">
<meta property="og:url" content="siteurl">
<meta property="og:type" content="website">
<meta property="og:description" content="website">
<meta property="og:image" content="siteurl/images/title.png">			
<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

<link rel="stylesheet" href="css/style.css">
<meta name="robots" content="noindex, follow">
</head>
<body>
<div class="wrapper">
<div class="inner">
<p class="p2"> אישורי הגעה </p><br>
<center>
<table>';
echo '<tr>';
while ($i < pg_num_fields($result))
{
	$fieldName = pg_field_name($result, $i);
	echo '<td><p class="p4">' . $fieldName . '</p></td>';
	$i = $i + 1;
}
echo '</tr>';
$i = 0;

while ($row = pg_fetch_row($result)) 
{
	echo '<tr>';
	$count = count($row);
	$y = 0;
	while ($y < $count)
	{
		$c_row = current($row);
		echo '<td><p class="p4">' . $c_row . '</p></td>';
		next($row);
		$y = $y + 1;
	}
	echo '</tr>';
	$i = $i + 1;
}
pg_free_result($result);

echo '
</table>
</center>
</div>
</div>
</body>
</html>';
}
else
{
	include_once("signin.html");
}
?>