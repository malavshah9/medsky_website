<?php
    session_start();
if(isset($_POST["tab"]))
{
	$uid=$_POST["id"];
	$pass=$_POST["pass"];
	
	require '../Shared/Classes/classusr.php';
$cnn=new usr_all;
$result=$cnn->loginselect($uid,$pass);

if($result->num_rows===1)
{
	
	$row=$result->fetch_assoc();
	//header('location:index.php');
		//$_SESSION["pass"]=$pass;
			//$row=$result->fetch_assoc();
	$id=$uid;
$name=$row["usr_name"];
	$token=$row["usr_token"];
	$flag=1;
	if($row["usr_verify"]==$flag)
	{
	echo $row["user_verify"];
	$_SESSION["pid"]=$id;
	$_SESSION["pname"]=$row["usr_name"];
	header('location: ../visitors/index.php');
	
	}
	else
	{
		
	//	header('location:notverified.php');	
		echo "You had not verified your account.";
		
	echo "<h1>We had sent you verification mail.Kindly check your email and verify your account to proceed further.</h1>";
	
echo '<h1><p class="reset"><a tabindex="4" href="../user_mst/verifyrep.php?token='.$token.'&id='.$id.'&name='.$name.'" title="Click here to resend the email.">Resend Email.</a></p></h1>';

		
	}
}
else
{
	//header('location:index.php');
	//echo "Enter Appropriate Password";
	//echo $uid,$pass;
	//echo "Entered User id Already taken";
	//header('patientlogsign.php');
	//echo '<script language="javascript">';
  //echo 'alery(Enter Appropriate Password)'; 
  //echo '</script>';
  
echo '<div class="btn btn-dark btn-lg btn-block">Enter Appropriate Username and PassWord </div>';

}
	
}
else
{
	header('location:../Users/writepresc1.php');
}

?>