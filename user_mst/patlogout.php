<?php
session_start();

if(empty($_SESSION["pid"]))
{
  header('location:../Visitors/patientlogsign.php');
}
else
{
  
            $_SESSION["pid"]=null;
}  
    

?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
    include '../Shared/Assets/links.php';
    ?>
  </head>  
  
  <body class="size-1140">
  	<!-- HEADER -->
    <header role="banner">    
      <!-- Top Bar -->
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
      
    </header>
    
    <!-- MAIN -->
    <main role="main">
    <?php
    if(empty($_SESSION["pid"]))
    {
    echo '<h1>You had successfully logged out Patient!!!</h1>';
    }
    ?>
    </main>
    
    <!-- FOOTER -->
    <?php
            include '../Shared/indexfooter.php';
      ?>
   </body>
</html>