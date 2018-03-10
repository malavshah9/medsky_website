<?php
include '../Shared/Assets/conditionforlogin.php';
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
    include '../Shared/Assets/links.php';
    ?>
  </head>  
  <?php
if(isset($_POST["sub1"]))
{
   
}
else
{
//    header('location:writeprescription1.php');
}
  ?>
  <body class="size-1140">
  	<!-- HEADER -->
    <header role="banner">    
      <!-- Top Bar -->
      <?php
      include '../Shared/Assets/topbar.php';
      ?>
      <!-- Top Navigation -->
      <?php
      include '../Shared/Assets/navigationbar1.php';
      ?>
      
    </header>
    
    <!-- MAIN -->
    <main role="main">
    <header class="section background-primary text-center">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Confirm Prescription</h1>
        </header>
        <table>
        <div class="line">
            <?php
                    $medarrays=array();
                    $med=null;
                    $timarrays=array();
                    $tim=null;
                    $cnt=$_POST["mcnt"];
                    $note=$_POST["note"];
                    $medicines=null;
                    $timings=null;
                    for($i=0,$j=1;$i<$cnt;$i++,$j++)
                    {
                        $med="med".$j;
                        $medarrays[$i]=$_POST["$med"];
                        $tim="tim".$j;
                        $timarrays[$i]=$_POST["$tim"];
                        $medicines=$medarrays[0];
                        $timings=$timarrays[0];
                    }
                    for($i=1;$i<$cnt;$i++)
                    {
                      $medicines=$medicines.','.$medarrays[$i];
                      $timings=$timings.','.$timarrays[$i];
                      
                      /*if($i=$cnt-1)
                      {
                        $medicines=$medicines.','.$medarrays[$i].'.';
                        $timings=$timings.','.$timings[$i].'.';
                      }
                      else
                      {
                      $medicines=$medicines.','.$medarrays[$i];
                      $timings=$timings.','.$timings[$i];
                      }*/
                    }
                    
                    
                    require '../Shared/Classes/classprescription.php';
                    $cnn=new pre;
                
                     $result=$cnn->insertmd("mdshah@gmail.com","d@gmail.com",$medicines,$timings,$note);
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
                     echo '<h1><ul><li>Precription Inserted Successfully.</li><li>We had Mailed One Copy to patient Regisered Mail id.</li><li>User can also view this precription to Our app "Medsky".</li></ul></h1>';
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
                        <h2><tr><td></td><td colspan="2"><a href="writeprescription1.php" class="submit-form button background-primary border-radius text-white">Click Here to Write Another Presription.</a></td></tr></h2>
                      </div>
                    </div>

</div>
        </table>
          </main>
    
    <!-- FOOTER -->
    <?php
    include '../Shared/Assets/footerbar.php';
    ?>

    <?php
    include '../Shared/Assets/footerlinks.php';
    ?>
   </body>
</html>