<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
	

      <meta charset="utf-10">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      

         
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../shared/assets1/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="../shared/assets1/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../shared/assets1/css/form-elements.css">
        <link rel="stylesheet" href="../shared/assets1/css/style.css">

            
    
<style>
body
{
    background-color:#002633 ;
}
button {
    background-color: #49BF4C;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
.cancelbtn {
       width: 100%;
       background-color: #f44336;
    }


</style>
    </head>

    <body>
	  
  <body>
   
    
<br><br>
<br>
<div class="col-sm-4"></div>
 
<div class="col-md-5">
 
 <div class="form-box">
     <div class="form-top">
         <div class="form-top-left">
             <h3>Change Password Form</h3>
             <p>Click on button for Change your Password....</p>
         </div>
         <div class="form-top-right">
         
         </div>
     </div>
     <div class="form-bottom">
         <form role="form" action="changepassword.php" method="post" class="registration-form">
             <div class="form-group">
                 <label class="sr-only" for="form-email">Old Password</label>
                 <input type="password" name="op"  value="" placeholder="Enter Old Password..."class="form-email form-control"required>
             </div>
             <div class="form-group">
                 <label class="sr-only" for="form-email">new Password</label>
                 <input type="password" name="np"  value="" placeholder="Enter New Password..."class="form-email form-control"required>
             </div>
             <div class="form-group">
                 <label class="sr-only" for="form-email">Confirm Password</label>
                 <input type="password" name="cp"  value="" placeholder="Confirm Your Password..."class="form-email form-control"required>
             </div>
           
          <div class="control-group">
									<button type="submit"name="num1">Change Password</button>
                                    </div>

