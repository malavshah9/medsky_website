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
        <form class="customform" name="writepresc2" action="writeprescription3.php" method="post">
        <div class="line">
            <?php
                    $mcnt=0;
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
                    $j=0;
                    for($cnt=1;$cnt<=10;$cnt++)
                    {
                      $times1=null;
                      $times2=null;
                      $times3=null;
                      $mcnt++;
                      $code1=0;
                      $code2=0;
                      $code3=0;
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
                      $mcnt--;
                      break;
                    }
                      if($times1!=null)
                      {
                        $code1=1;
                      }
                      else
                      {
                        $code1=0;
                      }
                      if($times2!=null)
                      {
                        $code2=1;
                      }
                      else
                      {
                        $code2=0;
                      }
                      if($times3!=null)
                      {
                        $code3=1;
                      }
                      else
                      {
                        $code3=0;
                      }

                    echo '<input type="hidden" name="tim'.$cnt.'" value="'.$code1.$code2.$code3.'">';
                    echo '<input type="hidden" name="med'.$cnt.'" value="'.$_POST["$mname"].'">';
                    echo '<div class="margin">'.
                      '<div class="s-12 m-12 l-6">'.
                      '<tr><td><label>Medicine'.$cnt.'</label></td><td><label>'.$_POST["$mname"].'</label></td></tr>';
                      
                      echo '<tr><td><label>Timings</label></td><td><label>'.$times1.','.$times2.','.$times3.'</label></td></tr>';
                      
                     echo '</div>'.
                    '</div>';
                  }
            ?>
                  <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <tr><td><label>Notes</label></td><td>
                          <strong>
                        <?php
                               echo '<input type="hidden" name="mcnt" value="'.$mcnt.'">';
                               
                        if($_POST["notes"]==null)  
                        {
                          echo '<input type="hidden" name="note" value="No Notes">';
                          
                          echo '<label>No Notes</label>';
                        }
                        else
                        {
                          echo '<input type="hidden" name="note" value="'.$_POST["notes"].'">';
                          
                          echo '<label>'.$_POST["notes"].'</label>';
                        }
                        ?>
                      </strong>
                      </td></tr>
                      </div>
                    </div>

                    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <tr><td></td><td colspan="2"><button name="sub1" class="submit-form button background-primary border-radius text-white" type="submit">Submit Precription</button></td></tr>
                      </div>
                    </div>

</div>
                </form>
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