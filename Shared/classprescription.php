<?php

class pre
{
    private static $conn=null;
    public static function connect()
    {
        self::$conn=mysqli_connect("localhost","root","","medsky");
        return self::$conn;
    }
    public static function disconnect()
    {
        mysqli_close($conn);
        self::$conn=null;
    }
    public function insert1($uid,$did)
    {
        $conn=pre::connect();
        $q="insert into prescription_tbl values('".null."','" .$uid. "','". $did ."')";
        $result=$conn->query($q);
        return $result;
        pre::disconnect();

    }
    public function insert2($pid,$mid,$mor,$noon,$nig)
    {
        $conn=pre::connect();
        $q="insert into med_time values('". $pid ."','" .$mid. "','". $mor ."','". $noon ."','". $nig ."')";
        $result=$conn->query($q);
        return $result;
        pre::disconnect();
    }
    public function display($uid,$did)
    {
        $conn=pre::connect();
        $q='select p.*,m.* from prescription_tbl p,med_time m where p.fk_user_email_id="'. $uid .'" and p.fk_doc_email_id="'. $did .'" and p.pk_prescrip_id=m.fk_prescrip_id';
        $result=$conn->query($q);
        return $result;
        pre::disconnect();  
    }
}