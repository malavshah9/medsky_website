<?php
class doc_all
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
        $cnn=doc_all::connect();
        $q="select * from doctor_mst";
        $result=$cnn->query($q);
        return $result;
        doc_all::disconnect();
    }
     public function loginselect($id,$pass)
    {
        $cnn=doc_all::connect();
        $q='select * from doctor_mst where pk_doc_email_id="'. $id .'"'.' and doc_pass="'. $pass .'"';
        $result=$cnn->query($q);
        return $result;
        doc_all::disconnect();
    }
    public function isverified($id,$token)
    {
        $cnn=doc_all::connect();
        $q='select * from doctor_mst where pk_doc_email_id="'. $id .'"'.' and doc_token="'. $token .'"';
        $result=$cnn->query($q);
        $row=$result->fetch_assoc();
        if($row["doc_token"]==$token)
        {
            return true;
        }
        else
        {
        return false;
        }
        doc_all::disconnect();
    }
      public function verificationupdate($did,$t)
    {
       $cnn=doc_all::connect();
       $p=1;
        $q="update doctor_mst set doc_verify='". $p ."' where pk_doc_email_id='". $did ."' and doc_token='". $t ."'";
//        echo $q;
         $result=$cnn->query($q);
       return $result;
        doc_all::disconnect();  
    }
 
    public function verify($id,$name,$token)
    {
                     error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
         require_once "../Shared/phpmailer/class.phpmailer.php";

         $rmail=$id;
         
         $link='<h3>Respected Sir,'.$name.'</h1><a href="localhost/Medsky1.1/doctor_mst/docverify.php?token='.$token.'&eid='.$rmail.'&name='.$name.'"><h1>Please Click here to Verify your account!!!</h1></a>';
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

    public function insert($did,$pass,$lno,$name,$spec,$deg,$img,$add,$gen,$mno,$token)
    {
        $cnn=doc_all::connect();
        $vari=0;      
        //$usertype="User";
        
        $q="insert into  doctor_mst values ('".null."','". $did ."','". $pass ."','". $lno ."','". $name ."','". $spec ."','". $deg ."','". $img ."','". $add ."','".$gen."','". $mno ."','". $vari ."','".$token."')";
        //echo $q;     
      
        $result=$cnn->query($q);
        return $result;
        doc_all::disconnect();

    }
    public function selectbyid($id)
    {
         $cnn=doc_all::connect();
        $q="select * from doctor_mst where pk_doc_email_id="."'$id'";
        $result=$cnn->query($q);
        return $result;
        doc_all::disconnect();
    }
    public function addinfo($id,$fk_spec_id,$fk_deg_id,$img,$add)
    {
        $cnn=doc_all::connect();
        $q="insert into doctor_mst values('". $fk_spec_id ."','". $fk_deg_id ."','". $img ."','". $add ."' where pk_doc_email_id='". $id ."')";
        $result=$cnn->query($q);
        return $result;
        doc_all::disconnect();
    }
    public function getpassword($enteredid)
    {
        $cnn=doc_all::connect();
         $q='select doc_pass from doctor_mst where pk_doc_email_id="'. $enteredid .'"';
        $result=$cnn->query($q);
        $row=$result->fetch_assoc();
        $pass=$row["doc_pass"];
        return $pass;
        doc_all::disconnect();
       }
       public function chngpass($id,$oldpass,$newpass){
        $conn=doc_all::connect();
        $sql="select * from doctor_mst where pk_doc_email_id='".$id."' and doc_pass='".$oldpass."' ";
        $res=$conn->query($sql);
        if($res->num_rows==1){
            $sql="update doctor_mst set doc_pass='".$newpass."' where pk_doc_email_id='".$id."' ";
            $res=$conn->query($sql);
            return $res;
        }
        else{
            return "User / Pass is incorrect";
        }
        doc_all::disconnect();
    }
    

}
?>
