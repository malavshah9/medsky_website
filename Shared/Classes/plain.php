<?php
    require 'classprescription.php';
    $cnn=new pre;
    $result=$cnn->displaymd("mdshah@gmail.com","d@gmail.com");
    $row=$result->fetch_assoc();
    $timings=$row["Timigs"];
    $mids=$row["M_Ids"];
    $time=explode(',',$timings);
    $medicines=explode(',',$mids);
?>
<html>
    <h1>Medicine Prescription Demo</h1>    
    
<table>
    <h2>Kindly Enter Here only Medicine IDs which you had entered into medicine table because this is a demo.</h2>
    <?php
    $i=0;
    //while($medicines[$i]!=null)
    while($i!=4)
    {

        echo '<tr><td><label>Medicine Id</label>:<td><label>'.$medicines[$i].'</label>';
        if($time[$i]%10==1)
        {
            echo '<td>Night:Yes</td>';
        }
        $time[$i]=$time[$i]/10;
        if($time[$i]%10==1)
        {
            echo '<td>Noon:yes</td>';
        }
        $time[$i]=$time[$i]/10;
        if($time[$i]%10==1)
        {
            echo '<td>Morning:Yes</td>';
        }
       /* if(strcmp($time[$i],"000")==0)
        {
            echo '<tr><td>No Time</td></tr>';
        }
        if(strcmp($time[$i],"100")==0)
        {
            echo '<tr><td>Morning Only</td></tr>';
        }
        if(strcmp($time[$i],"010")!=-1)
        {
            echo '<tr><td>Evening Only</td></tr>';
        }
        if(strcmp($time[$i],"001")!=-1)
        {
            echo '<tr><td>Evening Only</td></tr>';
        }
        if(strcmp($time[$i],"110")!=-1)
        {
            echo '<tr><td>Morning and Noon only</td></tr>';
        }
        if(strcmp($time[$i],"101")!=-1)
        {
            echo '<tr><td>Morning and Night Only</td></tr>';
        }
        if(strcmp($time[$i],"011")!=-1)
        {
            echo '<tr><td>Noon and Night Only</td></tr>';
        }
        if(strcmp($time[$i],"111")!=-1)
        {
            echo '<tr><td>Morning,noon and Night only</td></tr>';
        }*/
        $i++;
    }
    ?>
</table>
    </form>
</html>