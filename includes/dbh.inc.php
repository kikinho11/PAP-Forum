<?php

$serverName = "localhost";
$dBUsername = "webtest";
$dBPassword = "webtest";
$dBName = "forum";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName, 3306);

if (!$conn)
{
    die("Connection failed: ". mysqli_connect_error());
}


