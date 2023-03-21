<?php
include 'connect.php';

$requset = trim($_GET['link_chort']);
$requset = mysqli_real_escape_string($conn, $requset);

if (!empty($requset)) {
	$sel = mysqli_query($conn, "SELECT * FROM `links` WHERE `link` = '".$requset."'");

	if (!mysqli_num_rows($sel)) {
		$ins = mysqli_query($conn, "INSERT INTO `links` (`link`, `token`) VALUE ('".$requset."','".token_gen()."')");
		if ($ins) {
			echo "Ссылка добавлена";
		} else {
			echo "Ссылка не добавлена";
		}
	} else {
		echo "Всё плохо";
	}
}


function token_gen($min = 5, $max = 8) {
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDFEGHIJKLMNOPRSTUVWXYZ0123456789';
	$new_chars = str_split($chars);

	$token = '';
	$rand_end = mt_rand($min, $max);

	for ($i = 0; $i < $rand_end; $i++) {
		$token .= $new_chars[mt_rand(0, sizeof($new_chars) - 1)];
	}

	return $token;
}

//echo token_gen();