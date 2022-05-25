<?php

session_start();

if(isset($_SESSION['faujihouse_userid']))
{
    $_SESSION['faujihouse_userid'] = NULL;
    unset($_SESSION['faujihouse_userid']);
}


header ("Location:firstpage.php");
die;