<?php

$connectdb = "scheduler";
$hostdb = "172.16.238.13";
$userdb = "username";
$passdb = "password";

mysql_connect($hostdb, $userdb, $passdb) or
die("Could not connect: " . mysql_error());
mysql_select_db("$connectdb");

phpinfo();
