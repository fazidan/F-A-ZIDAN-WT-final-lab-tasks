<?php
session_start();
$nameErr = $passErr = "";
$name = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {        //$_SERVER["REQUEST_METHOD"] is default function......this function sent data by post method from php code

    $name = input_data($_POST["name"]);
    $pass = input_data($_POST["pass"]);
}
function input_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}