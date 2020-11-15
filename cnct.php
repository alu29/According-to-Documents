<?php

$DB_host = "35.187.175.33";
$DB_username = "readonly";
require_once("password.php"); // contains nothing but $DB_password = "XXX";
$DB_name = "accordingtodocs";

$link = mysqli_connect($DB_host, $DB_username, $DB_password, $DB_name);
if (!$link)
{
 echo "ERROR: ".mysqli_connect_error();
 exit;
}

?>