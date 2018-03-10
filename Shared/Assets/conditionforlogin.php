<?php
session_start();

if(empty($_SESSION["id"]))
{
    header('location:../Visitors/login.php');
}
if(empty($_SESSION["pid"]))
{
    header('location:../Visitors/patientlogsign.php');
}
?>