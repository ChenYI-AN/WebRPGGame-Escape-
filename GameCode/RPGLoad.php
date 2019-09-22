<?php
header('Content-Type: text/html; charset=utf-8');
include("RPG_Connect.inc.php");

$sql = "SELECT scene FROM map WHERE 1";
$result = mysqli_query($conn, $sql);

$get=mysqli_fetch_array($result);
$totalMaps=mysqli_num_rows($result);


echo 'test<br />';

  echo "$get[scene]";
?>
