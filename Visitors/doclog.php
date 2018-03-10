	<?php
      session_start();
	if(isset($_POST["sub"]))
	{
	$id=$_POST["eid"];
	$pass=$_POST["pass"];
	require '../Shared/classes/classdoc.php';
$cnn=new doc_all;
$result=$cnn->loginselect($id,$pass);
    
    
if($result->num_rows===1)
{
	
	$row=$result->fetch_assoc();
	
	/*	$_SESSION["eid"]=$id;*/
		
	$id=$id;
	$name=$row["doc_name"];
	$token=$row["doc_token"];
	$flag=1;
	if($row["doc_verify"]==$flag)
	{
	//	echo $row["user_verify"];
	$_SESSION["id"]=$id;
	$_SESSION["name"]=$row["doc_name"];
		
	header('location:../visitors/index.php');
	}
	else
	{
		
	//	header('location:notverified.php');	
		echo "You had not verified your account.";
		
	echo "<h1>We had sent you verification mail.Kindly check your email and verify your account to proceed further.</h1>";
	
echo '<h1><p class="reset"><a tabindex="4" href="../doctor_mst/verifyrepeat.php?token='.$token.'&eid='.$id.'&name='.$name.'" title="Click here to resend the email.">Resend Email.</a></p></h1>';

		
	}
} 
	else
	{
		
		//echo "Enter Appropriate Password";
		//echo "<br>";
		//header("Location:login.php");
		//echo $id;
		//echo "<br>";

		
		//echo $pass;
		
	
  
		 //phpAlert("Hello world!\\n\\nPHP has got an Alert Box");  
  /*echo '<script language="javascript">';
  echo 'alery(Enter Appropriate Password)';  //not showing an alert box.
  echo '</script>';*/
  

 /*<script language="javascript">
alert("Enter Appropriate Password");
//echo '$id';
</script>*/


  


	}		
}	


	else
	{
		//header('location:../visitor/index.php');
		
	}
	

	
    
    ?>