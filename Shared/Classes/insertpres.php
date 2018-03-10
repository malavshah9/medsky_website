<?php
    require 'classprescription.php';
    $cnn=new pre;

    if(isset($_POST["sub"]))
    {
        echo "<h1>Hello</h1>Hello";    
        $m1=$_POST["med1"];
        $m2=$_POST["med2"];
        $m3=$_POST["med3"];
        $m4=$_POST["med4"];
        $medids=$m1.",".$m2.",".$m3.",".$m4;
        echo $medids;
        $c1=0;
        $c2=0;
        $c3=0;
        $c4=0;
        $c5=0;
        $c6=0;
        $c7=0;
        $c8=0;
        $c9=0;
        $c10=0;
        $c11=0;
        $c12=0;
               
        if(empty($_POST["chb1"]))
        {

        }
        else
        {
            $c1=1;
        }

        if(empty($_POST["chb2"]))
        {

        }
        else
        {
            $c2=1;
        }
        if(empty($_POST["chb3"]))
        {

        }
        else
        {
            $c3=1;
        }
        if(empty($_POST["chb4"]))
        {

        }
        else
        {
            $c4=1;
        }
        if(empty($_POST["chb5"]))
        {

        }
        else
        {
            $c5=1;
        }
        if(empty($_POST["chb6"]))
        {

        }
        else
        {
            $c6=1;
        }
        if(empty($_POST["chb7"]))
        {

        }
        else
        {
            $c7=1;
        }
        if(empty($_POST["chb8"]))
        {

        }
        else
        {
            $c8=1;
        }
        if(empty($_POST["chb9"]))
        {

        }
        else
        {
            $c9=1;
        }
        if(empty($_POST["chb10"]))
        {

        }
        else
        {
            $c10=1;
        }
        if(empty($_POST["chb11"]))
        {

        }
        else
        {
            $c11=1;
        }
        if(empty($_POST["chb12"]))
        {

        }
        else
        {
            $c12=1;
        }
        echo "hello";
        $code1=$c1.$c2.$c3;
        echo $code1;

        
        $code2=$c4.$c5.$c6;
        echo $code2;

        
        $code3=$c7.$c8.$c9;
        echo $code3;

        
        $code4=$c10.$c11.$c12;
        echo $code4;
        $medid=array($code1,$code2,$code3,$code4);
//        $medid=array(array($code1),array($code2),array($code3),array($code4));
        for($i=0;$i<4;$i++)
        {
            echo "<br>$medid[$i]</br>";
        }

        $result=$cnn->insertmd("mdshah@gmail.com","d@gmail.com",$medids,$medid);
       if($result==true)
       {
           header('location:plain.php');
       }
       else
       {
           echo "Cant Successfully Inserted";
       }
    }
?>
<html>
    <h1>Medicine Prescription Demo</h1>    
    <form action="insertpres.php" method="post">
<table>
    <h2>Kindly Enter Here only Medicine IDs which you had entered into medicine table because this is a demo.</h2>
    <tr><td><label>Medicine 1 </label>:<td><input type="number" name="med1">
    <tr><td><td><input type="checkbox" value="true" name="chb1">Morning
        <td><input type="checkbox" value="true" name="chb2">Noon
        <td><input type="checkbox" value="true" name="chb3">Evening
    
    <tr><td><label>Medicine 2</label>:<td><input type="text" name="med2">
    <tr><td><td><input type="checkbox" value="true" name="chb4">Morning
        <td><input type="checkbox" value="true" name="chb5">Noon
        <td><input type="checkbox" value="true" name="chb6">Evening
    <tr><td><label>Medicine 3</label>:<td><input type="text" name="med3">
    <tr><td><td><input type="checkbox" value="true" name="chb7">Morning
        <td><input type="checkbox" value="true" name="chb8">Noon
        <td><input type="checkbox" value="true" name="chb9">Evening
    <tr><td><label>Medicine 4</label>:<td><input type="text" name="med4">
    <tr><td><td><input type="checkbox" value="true" name="chb10">Morning
        <td><input type="checkbox" value="true" name="chb11">Noon
        <td><input type="checkbox" value="true" name="chb12">Evening
    <tr><td><input type="submit" name="sub" value="Submit">
</table>
    </form>
</html>