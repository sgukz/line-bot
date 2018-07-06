<?php
$CONNECT_DB = mysql_connect('61.19.254.3', 'rehit', 'IT@101');
//$mysql = mysql_connect('127.0.0.1', 'root', '');
if (!$CONNECT_DB) {
    die('Could not connect: ' . mysql_error());
    exit;
} else {
    mysql_select_db("db_itreh");
    mysql_query("SET NAMES UTF8");
    //echo "Connected";
}
