<?php
    require 'classprescription.php';
    $cnn=new pre;
    if(isset($_POST["sub"]))
    {
        $m1=$_POST["med1"];
        $m2=$_POST["med2"];
        $m3=$_POST["med3"];
        $m4=$_POST["med4"];
        $ch1=$_POST["chb1"];
        $ch2=$_POST["chb2"];
        $ch3=$_POST["chb3"];
        $ch4=$_POST["chb4"];
        $ch5=$_POST["chb5"];
        $ch6=$_POST["chb6"];
        $ch7=$_POST["chb7"];
        $ch8=$_POST["chb8"];
        $ch9=$_POST["chb9"];
        $ch10=$_POST["chb10"];
        $ch11=$_POST["chb11"];
        $ch12=$_POST["chb12"];
        $result=$cnn->insert1("babbu@gmail.com","d@gmail.com");
        $result=$cnn->insert2("1,1,");
    }
?>
<html>
    <h1>Medicine Prescription</h1>    
    <form>
<table>
    <tr><td><label>Medicine 1</label>:<td><input type="text" name="med1">
    <tr><td><td><input type="checkbox" value="true" name="chb1"><td><input type="checkbox" value="true" name="chb2"><td><input type="checkbox" value="true" name="chb3">
    <tr><td><label>Medicine 2</label>:<td><input type="text" name="med2">
    <tr><td><td><input type="checkbox" value="true" name="chb4"><td><input type="checkbox" value="true" name="chb5"><td><input type="checkbox" value="true" name="chb6">
    <tr><td><label>Medicine 3</label>:<td><input type="text" name="med3">
    <tr><td><td><input type="checkbox" value="true" name="chb7"><td><input type="checkbox" value="true" name="chb8"><td><input type="checkbox" value="true" name="chb9">
    <tr><td><label>Medicine 4</label>:<td><input type="text" name="med4">
    <tr><td><td><input type="checkbox" value="true" name="chb10"><td><input type="checkbox" value="true" name="chb11"><td><input type="checkbox" value="true" name="chb12">
    <tr><td><input type="submit" name="sub" value="Submit">
</table>
    </form>
</html>