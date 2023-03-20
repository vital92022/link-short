<?php
include 'connect.php';

$requset = $_GET['link_chort'];

if (!empty($requset)) {
	$sel = mysqli_query($conn, "SELECT * FROM `links` WHERE `link` = '".$requset."'");

	if (!mysqli_num_rows($sel)) {
		echo "Всё хорошо";
	} else {
		echo "Всё прохо";
	}
}