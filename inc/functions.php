<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jstevens
 * Date: 9/13/13
 * Time: 10:04 AM
 * To change this template use File | Settings | File Templates.
 */
include 'inc/connection.php';
include "inc/connect.php";


function getMessageCount($dsid, $companyId)
{
    include 'inc/connection.php';
    $sql = <<<SQL
    SELECT count(id) as count
    FROM message
    where dsid = $dsid OR companyid = $companyId and sentat >= date_sub(current_date(), interval 1 year)
SQL;
    if(true)
    {
        $answer = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach($answer as $id)
        {
            $num = $id['count'];
        }

        return $num;
    }

}

function returnCompanyId($dsid)
{
    include 'inc/connection.php';
    $sql = <<<SQL
		select companyid
		from data_source
		where id = $dsid
SQL;

    if(true)
    {
        $answer = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach($answer as $id)
        {
            $companyId = $id['companyid'];
        }

        return $companyId;
    }
}


function returnTemplateNum($companyId)
{
    include 'inc/connection.php';
    $sql = <<<SQL
    SELECT count(id) as num
    FROM message_layout
    where companyid = $companyId;
SQL;

    if(true)
    {
        $answer = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach($answer as $id)
        {
            $tot = $id['num'];
        }

        return $tot;
    }
}


function checkEmail($email, $password)
{
    $sql = "SELECT COUNT(*) from campaign_user where email = '$email'";
    $str = md5($password);

    $result = mysql_query($sql) or die('Could not find member: ' . mysql_error());
    if (!mysql_result($result, 0, 0) > 0)
    {
        return false;
    }

    $sql = "SELECT * FROM campaign_user WHERE email = '$email' AND password = '$str' and (groupId = '5' OR groupId = '6')";
    $result = mysql_query($sql) or die('Could not find member: ' . mysql_error());
    if (!mysql_result($result, 0, 0) > 0)
    {
        return false;
    }
    else
    {
        return true;
    }
}


    function getName($id)
    {
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = mysql_query($sql) or die('Error in getName: ' . mysql_error());
        while (($row = mysql_fetch_assoc($result)))
        {
            $pid = sprintf('%s*%s*%s*%s',$row['id'],$row['firstName'], $row['lastName'], $row['lastLogin']);
        }
        return $pid;
    }

    function getUserId($user, $password)
    {
        $str = md5($password);
        $sql = "SELECT id FROM user WHERE email = '$user' AND password = '$str'";
        $result = mysql_query($sql) or die('Error in getUserId: ' . mysql_error());
        while (($row = mysql_fetch_assoc($result)))
        {
            $id = $row['id'];
        }
        echo $id;
        return $id;
    }

    function setLogin($id)
    {
        $time = date('Y-m-d H:i:s');
        $sql = "UPDATE user SET lastLogin = '$time' WHERE id = '$id'";

        $result = mysql_query($sql) or die('Error in checkEmail function 1: ' . mysql_error());
        if(!$result)
        {
            return false;
        }
        return true;
    }
?>