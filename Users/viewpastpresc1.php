<?php
include '../Shared/Assets/conditionforlogin.php';
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
  //  include '../Shared/Assets/links.php';
  include '../Shared/link.php';
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
  require '../Shared/Classes/classpresc1.php';
  $cnn=new pre;
  $uid=$_SESSION["pid"];
  $did=$_SESSION["id"];
  $result=$cnn->displayallprescbyid($uid,$did);
?>

      
  
    <main role="main">
  <!--<header class="section background-primary text-center">
  -->
            <text align="center"><h1>View Past Records</h1></text>
  
<!--</header>-->
<table class="table table-sm">
<thead>
    <tr align="center">
      <th scope="col">Sr. No.</th>
      <th scope="col">Prescription Date</th>
    </tr>
  </thead>
  <tbody>
<?php
$cnt=1;
while($row=$result->fetch_assoc())
{
  echo '<tr align="center">
  <th scope="col"><a href="viewpastpresc2.php?pid='.$row["pk_pres_id"].'">'.$cnt.'</a></th>
  <th scope="col"><a href="viewpastpresc2.php?pid='.$row["pk_pres_id"].'">'.$row["pres_date"].'</a></th>
  </tr>';
  $cnt++;
}
?>
</tbody>
</table>
      
    </main>
    
    <!-- FOOTER -->
    <?php
            include '../Shared/indexfooter.php';
      ?>
   </body>
</html>