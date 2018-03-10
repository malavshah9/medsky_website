<?php
class usr_all
{
    private static $conn=null;
    public static function  connect()
    {
        self::$conn=mysqli_connect("localhost","root","","medsky");
        return self::$conn;
    }
    public static function disconnect()
    {
        mysqli_close($conn);
        self::$conn=null;
    }
    public function select_all()
    {
        $cnn=usr_all::connect();
        $q="select * from user_mst";
        $result=$cnn->query($q);
        return $result;
        usr_all::disconnect();
    }
     public function loginselect($id,$pass)
    {
        $cnn=usr_all::connect();
        $q='select * from user_mst where pk_usr_email_id="'. $id .'"'.' and usr_pass="'. $pass .'"';
        $result=$cnn->query($q);
        return $result;
        usr_all::disconnect();
    }    
    public function isverified($id,$token)
    {
        $cnn=usr_all::connect();
        $q='select * from user_mst where pk_usr_email_id="'. $id .'"'.' and usr_token="'. $token .'"';
        $result=$cnn->query($q);
        $row=$result->fetch_assoc();
        if($row["usr_token"]===$token)
        {
            return true;
        }
        else
        {
        return false;
        }
        usr_all::disconnect();
    }
      public function verificationupdate($id,$t)
    {
       $cnn=usr_all::connect();
       $p=1;
        $q="update user_mst set usr_verify='". $p ."' where pk_usr_email_id='". $id ."' and usr_token='".$t."'";
//        echo $q;
         $result=$cnn->query($q);
       return $result;
        usr_all::disconnect();  
    }
    public function verify($id,$name,$token)
    {
                     error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
         require_once "../Shared/phpmailer/class.phpmailer.php";

         $rmail=$id;
         
         $link='<h3>Respected Sir,'.$name.'</h1><a href="localhost/Medsky1.1/user_mst/usrverify.php?token='.$token.'&id='.$rmail.'&name='.$name.'"><h1>Please Click here to Verify your account!!!</h1></a>';
         $message=$link;
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
         $mail->Port = 465;

         // your gmail address
         $mail->Username = 'medskyy@gmail.com';

         // your password must be enclosed in single quotes
         $mail->Password = 'nopassword1234';

         // add a subject line
         $mail->Subject = 'Verification Mail';

         // Sender email address and name
         $mail->SetFrom('medsky@gmail.com', 'info.medsky');

         $email1=$rmail;
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
     	$msg = "We had send you Verification Email so please first verify it ...";


         } catch (phpmailerException $e) {
         $msg = $e->getMessage();
         } catch (Exception $e) {
         $msg = $e->getMessage();
         }
         echo $msg;


    }
  public function insert($id,$name,$mno,$pass,$gen,$img,$token,$type)
       {
           $cnn=usr_all::connect();
           $vari=0;      
           //$usertype="User";
           $q="insert into user_mst values ('". null ."','". $id ."','". $name ."','". $mno ."','". $pass ."','". $gen ."','". $img ."','". $vari ."','". $token ."','".$type."')";
         //  echo $q;        
           $result=$cnn->query($q);
           return $result;
           usr_all::disconnect();
   
       }
       public function getpassword($enteredid)
       {
           $cnn=usr_all::connect();
            $q='select usr_pass from user_mst where pk_usr_email_id="'. $enteredid .'"';
           $result=$cnn->query($q);
           $row=$result->fetch_assoc();
           $pass=$row["usr_pass"];
           return $pass;
           usr_all::disconnect();
          }
          public function selectbyid($id)
          {
               $cnn=usr_all::connect();
              $q="select * from user_mst where pk_usr_email_id="."'$id'";
              $result=$cnn->query($q);
              return $result;
              usr_all::disconnect();
          }
          public function chngpass($id,$oldpass,$newpass){
            $cnn=usr_all::connect();
            $sql="select * from user_mst where pk_usr_email_id='".$id."' and usr_pass='".$oldpass."' ";
            $res=$cnn->query($sql);
            if($res->num_rows==1){
                $sql="update user_mst set usr_pass='".$newpass."' where pk_usr_email_id='".$id."' ";
                $res=$cnn->query($sql);
                return $res;
            }
            else{
                return "User / Pass is incorrect";
            }
            usr_all::disconnect();

        }
         
   
   
   
}
?>