<?php
  $hostname   = "localhost";
  $usernamedb = "root";
  $passworddb = "";
  $dbName     = "exampledatabase";

$mysqli=new mysqli($hostname, $usernamedb, $passworddb,$dbName);
if ($mysqli->connect_error)
  die("Connection failed:".$mysqli->connect_error);
?>