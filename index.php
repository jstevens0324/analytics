<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jstevens
 * Date: 9/12/13
 * Time: 10:03 AM
 * To change this template use File | Settings | File Templates.
 */

include "inc/connection.php";

include "inc/functions.php";


if(isset($_POST['submit']))
{
    $error_no = 0;

    if($_POST['email'] == '')
    {
        echo 'Please Fill in Email.';
        $error_no++;
    }

    if($_POST['password'] == '')
    {
        echo 'Please enter a password';
    }

    if(checkEmail($_POST['email'], $_POST['password']))
    {
        Session_start ();
        if( isset($_POST['email']) && isset($_POST['password']) )
        {
            $_SESSION['user'] = $_POST['email'];
            header("Location: http://".$_SERVER['HTTP_HOST']."/home.php");
            ob_end_flush();
        }
        else
        {
            header( "Location: index.php" );
        }

    }
    else {
        ECHO 'Email or Password is Incorrect!';
    }
}
else
{

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/ico/favicon.png">

        <title>Petwise Connect Sign In</title>

        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

    <div class="container">
        <div class="logo_signin" >
            <img src="images/connect_logo3.png"/>
        </div>
        <form class="form-signin" action="index.php" method="POST">

            <h2 class="form-signin-heading">Please sign in</h2>
            <input type="text" class="form-control" placeholder="Email address" name="email" autofocus>
            <input type="password" class="form-control" placeholder="Password" name="password">
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="submit" name="submit">Sign in</button>
        </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    </body>
    </html>
<?}?>