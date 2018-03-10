<?php
session_start();
/*if(!(empty($_SESSION["name"])))
	{
		header('location:../Users/userprofile.php');
	}*/
require '../Shared/Classes/classdoc.php';

$id=$_GET["eid"];
	$name=$_GET["name"];
	$token=$_GET["token"];
	echo $id;
	echo $name;
	echo $token;
	$conn=new doc_all;
		$conn->verify($id,$name,$token);
		header('location:../Doctor_mst/login.php');

?>