<?php
session_start();
$_email=$_SESSION['id'];
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $_newpass=$_POST["np"];
        $_oldpass=$_POST["op"];
        $_repepass=$_POST["cp"];
        if($_newpass==$_repepass){
            require '../Shared/Classes/classdoc.php';
        $obj=new doc_all();
        $result=$obj->chngpass($_email,$_oldpass,$_newpass);
        //echo "update user_tbl set user_pass='".$_newpass."' where email_id='".$_email."' ";
        if($result===true){
            echo "Password updated";
            header('location:../visitor/login.php');
        }
        else{
            echo "Not done";
            echo $result;
        }
        }
        else{
            echo "Passwords are not same";
        }
    }

?>