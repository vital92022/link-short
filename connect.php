<?php

$conn = mysqli_connect('localhost','root', '', 'bd_links');

if (!$conn) die("Ошибка подключения к БД: \n" . mysqli_connect_error());