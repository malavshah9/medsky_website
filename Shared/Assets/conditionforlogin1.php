<?php
session_start();

if(empty($_SESSION["id"]))
{
    header('location:../Visitors/login.php');
}
?>