<?php
include 'connect.php';

$requset = trim($_GET['link_short']);
$requset = mysqli_real_escape_string($conn, $requset);

if (isset($_GET['link_short'])) {
	$search_bool = false;
	$token = '';

	while (!$search_bool) {
		$token = token_gen();
		$sel = mysqli_query($conn, "SELECT * FROM `links` WHERE `token` = '".$token."'");

		if (!mysqli_num_rows($sel)) {
			$search_bool = true;
			break;
		}
	}


	if ($search_bool) {
		$ins = mysqli_query($conn, "INSERT INTO `links` (`link`, `token`) VALUES ('".$requset."','".$token."')");

		if ($ins) {
			$_GET['link_short'] = $_SERVER['SERVER_NAME'].'/'.$token;
			//echo "Ссылка добавлена";
		} else {
			//echo "Ссылка не добавлена";
		}
	} else {
		//echo "Всё плохо";
	}
} else {
	$URI = $_SERVER['REQUEST_URI'];
	$token = substr($URI, 1);

	if (iconv_strlen($token)) {
		$sel = mysqli_query($conn, "SELECT * FROM `links` WHERE `token` = '".$token."'");

		if (mysqli_num_rows($sel)) {
			$row = mysqli_fetch_assoc($sel);

			header("Location: " . $row['link']);
		} else {
			die("Ошибак токена");
		}
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