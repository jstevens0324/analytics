<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jstevens
 * Date: 9/18/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */
    session_start();
    unset($_SESSION['user']);
    session_destroy();
    header("Location: index.php");
?>