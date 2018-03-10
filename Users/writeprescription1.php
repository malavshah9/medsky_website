<?php
include '../Shared/Assets/conditionforlogin.php';
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
include '../Shared/link.php';
    //include '../Shared/Assets/links.php';
    ?>
  </head>  
  
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
    
    <!-- MAIN -->
    <main role="main">
<!--    <header class="section background-primary text-center"> -->
          <!--  <text align="center"><h1>Write Prescription</h1></text>
    <!--    </header>-->
        <table class="table table-bordered">
        <form class="customform" name="writepresc1" action="writeprescription2.php" method="post">
        <div class="line">
        <table border="15">
        <tr rowspan="2"><td>Medicine Name</td><td>Instruction</td><td rowspan="2">
        <td colspan="3">Frequency</td><td>Days</td></tr>
        <tr><td></td><td></td><td>Morning</td><td>Afternoon</td><td>Night</td><td></td></tr>
        <tr><td><input type="text" name="med"></td><td><textarea rows="3" cols="10"></textarea></td>
        <td><input type="number" size="5"></td><td><input type="number" size="5"></td><td><input type="number" size="5"></td><td><input type="number" size="3"></td></tr>
        </table>
            <?php
                    $cnt=1;
                    for($cnt=1;$cnt<=10;$cnt++)
                    {
                    echo '<div class="margin">'.
                      '<div class="s-12 m-12 l-6">'.
                        '<tr><td><label>Medicine '.$cnt.'</label></td><td><input name="med'.$cnt.'" class="email border-radius" placeholder="Medicine '.$cnt.'" type="text" /></td><td>Dosage</td><td><input type="number" class="email border-radius" placeholder="Enter Dose" >for <input type="number" class="email border-radius" placeholder="Days required">Days </td></tr>'.
                        '<tr><td><tabel>Timings</tabel></td><td><input type="checkbox" name="chb'.$cnt.'1" value="m">Morning/Noon<input type="checkbox" name="chb'.$cnt.'2" value="e">Evening<input type="checkbox" name="chb'.$cnt.'3" value="n">Night</td></tr>'.
                     '</div>'.
                    '</div>';
                    }
            ?>
  
                    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <tr><td><label>Notes(Max 200 Chars)</label></td><td>
                        <textarea name="notes" class="message border-radius" placeholder="Your message" rows="7" cols="50"></textarea>
    
                      </td></tr>
                      </div>
                    </div>

                    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <tr><td></td><td colspan="2"><button name="sub1" class="submit-form button background-primary border-radius text-white" type="submit">Confirm Precription</button></td></tr>
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