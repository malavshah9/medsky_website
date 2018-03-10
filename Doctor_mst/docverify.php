<?php
//session_start();
/*if(!(empty($_SESSION["name"])))
{
    header('location:login.php');
}*/

    require '../Shared/Classes/classdoc.php';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
  
	</head>

    <body>

                    <?php
                        $token=$_GET["token"];
                        $id=$_GET["eid"];
						$name=$_GET["name"];
                        $conn=new doc_all;
                        $result=$conn->isverified($id,$token);
                        if($result==true)
                        {
                            $result=$conn->verificationupdate($id,$token);
                            if($result==true)
                            {
								$_SESSION["eid"]=$id;
								$_SESSION["name"]=$name;
								$f=1;
								echo	'<h4 class="title"><span class="text"><strong>You Had Verified Successfully!!! <a href="../Visitors/index.php">You had successfully verified!!!Click Here to Proceed further.</a></a></strong></span></h4>';
                            }
                        }
                        else
                        {
                            echo "Can`t Verified Successfully";
                        }

                    ?>			
					


  </body>
</html>
