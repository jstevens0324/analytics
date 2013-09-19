<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jstevens
 * Date: 9/13/13
 * Time: 10:04 AM
 * To change this template use File | Settings | File Templates.
 */

/*** mysql hostname ***/
//$hostname = 'mcallister.servers.deltasys.com';
$hostname = '172.20.6.125';

// Database name
$dbname = 'vetlogic_live';

/*** mysql username ***/
//$username = 'vetlogic_live';
$username = "warren";

/*** mysql password ***/
//$password = '?yW13F{*=?';
$password = "mumbojumbo10";

try
{
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*** echo a message saying we have connected ***/
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>