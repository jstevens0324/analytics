<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jstevens
 * Date: 9/18/13
 * Time: 7:03 PM
 * To change this template use File | Settings | File Templates.
 */

$host = '172.20.6.125';
$db_name = 'vetlogic_live';
$username = "warren";
$password = "mumbojumbo10";

$conn = mysql_connect("$host", "$username", "$password")or die("cannot connect to server");
mysql_select_db("$db_name")or die("cannot select db");
?>