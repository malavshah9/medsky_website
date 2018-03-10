<?php
include '../Shared/Assets/conditionforlogin.php';
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
    include '../Shared/link.php';
    ?>
  </head>  
  <?php
if(!(isset($_POST["sub1"])))
{
   header('location:writepresc1.php');
}

  ?>
  <body class="size-1140">
  	<!-- HEADER -->
    <?php
    if(empty($_SESSION["id"]))
    {
      include '../Shared/header.php';
    }
    else
    {
      include '../Shared/header1.php';
    }
  ?>
   
    <main role="main">
    <text align="center"><h1>Submission of Prescription</h1></text>
        
        <table>
        <div class="line">
            <?php
            
            require '../Shared/Classes/classpresc1.php';
            $cnn=new pre;
                    $medicines=null;
                    $days=$mornings=$noons=$nights=$instructions=null;
                    for($i=1;$i<=$_POST["mcnt"];$i++)
                    {
                        $mname="med".$i;
                        $iname="ins".$i;
                        $morname="mor".$i;
                        $nonname="non".$i;
                        $nigname="nig".$i;
                        $day="day".$i;
  
                        $medicines=$medicines.$_POST["$mname"].",";
                        $days=$days.$_POST["$day"].",";
                        $mornings=$mornings.$_POST["$morname"].",";
                        $noons=$noons.$_POST["$nonname"].",";
                        $nights=$nights.$_POST["$nigname"].",";
                        $instructions=$instructions.$_POST["$iname"].",";                        
                        
                    }
                    
                    /*echo $medicines.'<br>';
                    
                    echo $days.'<br>';
                    
                    echo $mornings.'<br>';
                    
                    echo $noons.'<br>';
                    
                    echo $nights.'<br>';
                    
                    echo $instructions.'<br>';*/
                   
                    
                    
                    $uid=$_SESSION["pid"];
                    $did=$_SESSION["id"];
                     $result=$cnn->insertmd($did,$uid,$medicines,$mornings,$noons,$nights,$instructions,$days);
                      if($result==true)
                      {
                          $f=1;
                      }
                      else
                      {
                        $f=0;    
                      }
                   if($f==0)
                   {
                     echo '<h2>Can`t Inserted to Database.Some error occured.Please Start again.</h2>';
                   }
                   else
                   {
//Here Starts Mailing
//Here Is Body
date_default_timezone_set('Asia/Kolkata');
$timestamp = time();
$date_time = date("d-m-Y (D) H:i:s", $timestamp);
$res=$cnn->getpatientname($_SESSION["pid"]);
$row=$res->fetch_assoc();
$patname=$row["usr_name"];

$res=$cnn->getdoctorname($_SESSION["id"]);
$row=$res->fetch_assoc();
$docname=$row["doc_name"];


$medskybody='<p align="center">
<font color="red" size="10">
    Medsky</font>
<font color="blue" size="5">
    </p>
<p>
        Respected Sir/Medam,
    <p>
            Here is Your Prescription Details.
            You can also view this prescription in our app called as "Medsky".
            <a href="">Download that app from here</a>
    </p>
</p>
</font>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<table border="4" style="font-family:arial;" class="table">
<form>
        
<tr><td colspan="3">Date:</td><td colspan="3">'.$date_time.'</td></tr>
<tr><td>Doctor Name</td><td colspan="2">'.$docname.'</td><td>Patient Name</td><td colspan="2">'.$patname.'</td></tr>
<tr rowspan="2">
<th>Medicine Name</th>
<th>Days</th>
<th colspan="3">Frequency</th>
<th>Instruction</th>
</tr>
<tr>
<td></td>
<td></td>
<td>Morning</td>
<td>Afternoon</td>
<td>Night</td>
<td></td>
</tr>';

for($i=1;$i<=$_POST["mcnt"];$i++)
{
    $mname="med".$i;
    $iname="ins".$i;
    $morname="mor".$i;
    $nonname="non".$i;
    $nigname="nig".$i;
    $day="day".$i;
    $res=$cnn->medicinenamebyid($_POST["$mname"]);
    $row=$res->fetch_assoc();
    $medskybody=$medskybody.'<tr>  
    <td>'.
    $row["med_name"].'</td>
    <td>'.$_POST["$day"].'</td>
    <td>'.$_POST["$morname"].'</td>
    <td>'.$_POST["$nonname"].'</td>
    <td>'.$_POST["$nigname"].'</td>
    <td>'.$_POST["$iname"].'</td></tr>';                        
    
}
$medskybody=$medskybody.''.'</form>
</table>';


//Here is Ending of Body

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once "../Shared/Assets/phpmailer/class.phpmailer.php";

//$message="hello";
$message=$medskybody;
// creating the phpmailer object
$mail = new PHPMailer(true);

// telling the class to use SMTP
$mail->IsSMTP();

// enables SMTP debug information (for testing) set 0 turn off debugging mode, 1 to show debug result
$mail->SMTPDebug = 0;

// enable SMTP authentication
$mail->SMTPAuth = true;

// sets the prefix to the server
$mail->SMTPSecure = 'ssl';

// sets GMAIL as the SMTP server
$mail->Host = 'smtp.gmail.com';

// set the SMTP port for the GMAIL server
$mail->Port = 587;

// your gmail address
$mail->Username = 'medskyy@gmail.com';

// your password must be enclosed in single quotes
$mail->Password = 'nopassword1234';

// add a subject line
$mail->Subject = 'Your Prescription';

// Sender email address and name
$mail->SetFrom('medsky@gmail.com', 'info.medsky');

$email1=$_SESSION["pid"]; 
// reciever address, person you want to send
$mail->AddAddress($email1);

// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');


// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body
$mail->MsgHTML($message);


// add attachment if any
//$mail->AddAttachment('time.png');

try {
    // send mail
	
	//don't forget to enable openssl true from php_extensions
    $mail->Send();
    $msg = "We had send one copy of Prescription to patient`s registered email id.He/She can checkout there.";
} catch (phpmailerException $e) {
    $msg = $e->getMessage();
} catch (Exception $e) {
    $msg = $e->getMessage();
}
echo $msg;

//Here Ends Mailing

                     echo '<h1><ul><li>Precription Inserted Successfully.</li><li>User can also view this precription to Our app "Medsky".</li></ul></h1>';
                   }

                    /*
                    $cnt=1;
                    $mname=null;  
                    $time1=$time2=$time3=null;
                    $t1=1;
                    $t2=2;
                    $t3=3;
                    $times1=null;
                    $times2=null;
                    $times3=null;
                    $notes="-";
                    for($cnt=1;$cnt<=10;$cnt++)
                    {
                      $times1=null;
                      $times2=null;
                      $times3=null;
                      
                      $mname="med".$cnt;
                    $time1="chb".$cnt.$t1;
                    $time2="chb".$cnt.$t2;
                    $time3="chb".$cnt.$t3;
                    if(isset($_POST["$time1"]))
                    {
                            $times1="Morning/Noon";
                    }
                    if(isset($_POST["$time2"]))
                    {
                            $times2="Evening";        
                    }
                    if(isset($_POST["$time3"]))
                    {
                      
                            $times3="Night";
                    }
                    if($_POST["$mname"]==null)
                    {
                      break;
                    }
                    
                    echo '<input type="hidden" name="med"'.$cnt.'" value="'.$_POST["$mname"].'">';
                    echo '<div class="margin">'.
                      '<div class="s-12 m-12 l-6">'.
                      '<tr><td><label>Medicine'.$cnt.'</label></td><td><label>'.$_POST["$mname"].'</label></td></tr>';
                      
                      echo '<tr><td><label>Timings</label></td><td><label>'.$times1.','.$times2.','.$times3.'</label></td></tr>';
                      
                     echo '</div>'.
                    '</div>';
                    }*/
            ?>
                  <div class="margin">
                      <div class="s-12 m-12 l-6">
                          <strong>
                        <?php
                       /* if($_POST["notes"]==null)  
                        {
                            echo '<label>No Notes</label>';
                        }
                        else
                        {
                          echo '<label>'.$_POST["notes"].'</label>';
                        }*/
                        ?>
                      </strong>
                      </td></tr>
                      </div>
                    </div>

                    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <h2><tr><td></td><td colspan="2"><a href="writepresc1.php" class="submit-form button background-primary border-radius text-white">Click Here to Write Another Presription.</a></td></tr></h2>
                      </div>
                    </div>

</div>
        </table>
          </main>
    
    <!-- FOOTER -->
    <?php
            include '../Shared/indexfooter.php';
      ?>
   </body>
</html>